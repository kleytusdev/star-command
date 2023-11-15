<div class="mx-auto my-auto flex max-w-xs flex-col items-center rounded-xl border px-4 py-4 text-center md:max-w-lg md:flex-row md:items-start md:text-left">
    <div class="mb-4 md:mr-6 md:mb-0">
      <img class="h-56 rounded-lg object-cover md:w-56" src="{{ asset('storage/products/' . $product->photo_uri) }}" alt="" />
    </div>
    <div class="">
      <p class="text-xl font-medium text-gray-700">{{ $product->name }}</p>
      <p class="mb-4 text-sm font-medium text-gray-500">Senior Editor</p>
      <div class="flex space-x-2">
        <div class="flex flex-col items-center rounded-xl bg-gray-100 px-4 py-2">
          <p class="text-sm font-medium text-gray-500">Articles</p>
          <p class="text-3xl font-medium text-gray-600">13</p>
        </div>
        <div class="flex flex-col items-center rounded-xl bg-gray-100 px-4 py-2">
          <p class="text-sm font-medium text-gray-500">Papers</p>
          <p class="text-3xl font-medium text-gray-600">7</p>
        </div>
        <div class="flex flex-col items-center rounded-xl bg-gray-100 px-4 py-2">
          <p class="text-sm font-medium text-gray-500">Followers</p>
          <p class="text-3xl font-medium text-gray-600">2.5k</p>
        </div>
        <div class=""></div>
      </div>
      <div class="mb-3"></div>
      <div class="flex space-x-2">
        <button class="w-full rounded-lg border-2 bg-white px-4 py-2 font-medium text-gray-500">Message</button>
        <button class="w-full rounded-lg border-2 border-transparent bg-blue-600 px-4 py-2 font-medium text-white">Follow</button>
      </div>
    </div>
  </div>
