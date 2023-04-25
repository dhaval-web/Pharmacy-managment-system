<x-app-layout>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
            @vite('resources/css/app.css')

            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />   

    <title>Document</title>
</head>
<body>

<div class="flex flex-wrap ">
  <section class="relative mx-auto">
      <!-- navbar -->
    <nav class="flex justify-between bg-gray-900 text-white w-screen">
      <div class="px-5 xl:px-12 py-6 flex w-full items-center">
        <a class="text-3xl font-bold font-heading" href="dashbord">
          <!-- <img class="h-9" src="logo.png" alt="logo"> -->
         Pharmacy Managment System
        </a>
        <!-- Nav Links -->
        <ul class="hidden md:flex px-4 mx-auto font-semibold font-heading space-x-12">
          <li><a class="hover:text-gray-200" href="catagory_view">Catagory</a></li>
          <li><a class="hover:text-gray-200" href="medicine_view">Medicine</a></li>
          <li><a class="hover:text-gray-200" href="stock_view">Stock</a></li>
          <li><a class="hover:text-gray-200" href="member_view">Users</a></li>
        </ul>

      </div>
      <!-- Responsive navbar -->
     
      <a class="navbar-burger self-center mr-12 xl:hidden" href="#">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 hover:text-gray-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
          </svg>
      </a>
    </nav>

  </section>
</div>

  
    <form method="post" action="{{url('stock_view')}}">
        @csrf
        <center>
        <table class="border-collapse border-2 border-gray-500 my-20 text-center ">
        <thead >
     <tr>
        <th>
        <input type="submit" value="submit" class="bg-transparent hover:bg-blue-500 text-blue-500 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
        <input type="text" name="medicine_name" >
        </th>
      
</tr>
</form>

<tr>
  <th >
        <a href="{{url('/add_stock')}}" ">
        <i class="fa-solid fa-user-plus fa-xl" style="color: #1266f8;"></i>
        </a>
       
        </th>

     </tr>


        </thead>    
    <thead class="bg-slate-900 bg-slate-900 text-white"> 
    <tr>
      <th class="border border-gray-400 px-4 py-2  ">Medicine name</th>
      <th class="border border-gray-400 px-4 py-2 ">Medicine catagory</th>
      <th class="border border-gray-400 px-4 py-2 ">Perchase price</th>
      <th class="border border-gray-400 px-4 py-2 ">Quantity</th>
      <th class="border border-gray-400 px-4 py-2 ">Suplair</th>
      <th class="border border-gray-400 px-4 py-2 ">Expair_date</th>
      <th class="border border-gray-400 px-4 py-2 ">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($stock as $stock)
    <tr>
      <td class="border border-gray-400 px-4 py-2 text-gray-800 ">{{$stock->medicine_name}}</td>
      <td class="border border-gray-400 px-4 py-2 text-gray-800 ">{{$stock->medicine_catagory}}</td>
      <td class="border border-gray-400 px-4 py-2 text-gray-800 ">{{$stock->perchase_price}}</td>
      <td class="border border-gray-400 px-4 py-2 text-gray-800 ">{{$stock->quantity}}</td>
      <td class="border border-gray-400 px-4 py-2 text-gray-800 ">{{$stock->suplair}}</td>
      <td class="border border-gray-400 px-4 py-2 text-gray-800 ">{{$stock->expair_date}}</td>

      <td class="border border-gray-400 px-4 py-2 text-gray-800 space-x-3">
      <a href="{{url('edit_stock')}}/{{ $stock->id}}">
      <i class="fa-solid fa-pen-to-square fa-xl" style="color: #195fd7;"></i>
      </a>
      <a  href="{{url('delete_stock')}}/{{$stock->id}}">

      <i class="fa-sharp fa-solid fa-trash fa-xl" style="color: #d92020;"></i>
       
      </td>
      
      
      </td>
    </tr> 

    @endforeach
  </tbody>
 
</table>

</center>
</body>
</html>


</x-app-layout>