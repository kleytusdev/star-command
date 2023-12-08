<?php

namespace App\Livewire\Category;

use CURLFile;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithFileUploads;

class Store extends Component
{
    use WithFileUploads;

    public $name, $photoUri, $tagName;

    public function render()
    {
        return view('livewire.category.store');
    }

    public function store()
    {
        $rules = [
            'photoUri' => ['nullable', 'image'],
            'name' => ($this->photoUri) ? ['nullable', 'string', 'min:4', 'not_in:""'] : ['required', 'string', 'min:4', 'not_in:""'],
        ];

        $this->validate($rules);

        $category = [
            'name' => $this->name,
            'photo_uri' => $this->photoUri,
        ];
        $tagNameWithHighestProbability = null;

        // Guardar el archivo en el disco 'public' y obtener la ruta completa
        if ($this->photoUri && $this->name === null || $this->name === '') {
            $customVisionResponse = $this->customVision();

            // Inicializar una variable para almacenar el tagName del mayor probability
            $highestProbability = 0.75;

            // Iterar sobre cada predicción
            $foundCategory = false;

            foreach ($customVisionResponse->predictions as $prediction) {
                // Acceder a las propiedades de cada predicción
                $probability = $prediction->probability;

                // Verificar si el probability es mayor a 0.85
                if ($probability > $highestProbability) {
                    // Actualizar el tagName si encontramos un probability mayor
                    $tagNameWithHighestProbability = $prediction->tagName;
                    $foundCategory = true;
                    break; // Salir del bucle si encontramos una categoría
                }
            }

            if (!$foundCategory) {
                $this->addError('photoUri', "No pudimos encontrar esta categoría. Ingresa el nombre manualmente por favor.");
                return;
            } else {
                session()->flash('success', '¡Encontramos una coincidencia de esta categoría!');
                $this->name = $tagNameWithHighestProbability;
                return;
            }
        }


        if ($this->name === null || $this->name === '') {
            $this->name = $tagNameWithHighestProbability;
            return;
        }

        $extension = $this->photoUri->extension();
        $imageName = date('YmdHis') . '_' . rand(11111, 99999) . '.' . $extension;
        $this->photoUri->storeAs('public/categories', $imageName);
        $category['photo_uri'] = $imageName;

        Category::create($category);
        session()->forget('success'); // Invalidar el flash session
        return redirect()->route('categories.index');
    }

    public function customVision()
    {
        $curl = curl_init();
        $photo = $this->photoUri->getRealPath();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://southcentralus.api.cognitive.microsoft.com/customvision/v3.0/Prediction/b372a266-a93c-4c55-895c-b3844dfbbc79/classify/iterations/Tubazos/image',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array('' => new CURLFile($photo)),
            CURLOPT_HTTPHEADER => array(
                'Prediction-Key: 0623725ffbc64effb1db9e1e964b3e1f',
                'Content-Type: multipart/form-data'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        try {
            return json_decode($response);
        } catch (\Exception $e) {
            return false;
        }
    }
}
