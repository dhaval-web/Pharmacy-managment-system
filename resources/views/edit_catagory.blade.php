<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
            @vite('resources/css/app.css')

    <title>Document</title>
</head>
<body>
<h2>Update Catagory</h2>
<form method="post" action="{{route('update.users')}}">
  @csrf       

    <div class="min-h-screen p-6 bg-gray-100 flex items-center justify-center">
  <div class="container max-w-screen-lg mx-auto">
    <div>
       <div class="bg-white rounded shadow-lg p-4 px-4 md:p-8 mb-6">
            <p class="font-medium text-lg">Add Catagory</p>
           

          <div class="lg:col-span-2">
            <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5">
              <div class="md:col-span-5">
               <input type="hidden" name="id" value="{{$catagory->id}}">
                <input type="text" name="add_catagory" id="add_catagory" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="{{ $catagory->catagory }}"/>
              </div>

              
              <div class="md:col-span-5 text-right">
                <div class="inline-flex items-end">
                <input type="submit" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
    </div>
  </form>
</body>
</html>