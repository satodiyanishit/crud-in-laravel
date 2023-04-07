
@extends('welcome')
@section('content')


<!-- Button trigger modal -->
<center>
<button type="button" class="btn btn-primary fw-bold fs-5 rounded-pill" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
  Add Records
</button>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">CRUD</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="insertData" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-2">
                <input type="text" placeholder="Enter Product name" class="form-control" name="pname" id="">
            </div>
            <div class="mb-2">
                <input type="text" placeholder="Enter Product price" class="form-control" name="pprice" id="">
            </div>
            <div class="mb-2">
                <input type="file" class="form-control" name="image" id="">
            </div>
            <button type="submit" class="btn btn-primary fw-bold fs-7 rounded-pill">Add Record</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
</div>
</center>

<div class="container">
    <table class="table mt-5">
        <thead class="bg-black text-white fw-bold text-center">
            <th>Id</th>
            <th>Product Name</th>
            <th>Product Price</th>
            <th>Product image</th>
            <th>Update</th>
            <th>Delete</th>
        </thead>
        <tbody class="text-center fs-4 bg-light">
            @foreach($data as $item)
            <tr>
                <form action="updatedelete" method="get">
                <td class="pt-4"><input type="hidden" name="id" value="{{$item['Id']}}">{{$item['Id']}}</td>
                <td class="pt-4"><input type="hidden" name="name" value="{{$item['PName']}}">{{$item['PName']}}</td>
                <td class="pt-4"><input type="hidden" name="price" value="{{$item['PPrice']}}">{{$item['PPrice']}}</td>
                <td><img src="images/{{$item['PImage']}}" width="100px" height="100px" alt=""></td>
                <td class="pt-4"><input type="submit" class="btn btn-primary" name="update" value="Update"></td>
                <td class="pt-4"><input type="submit" class="btn btn-primary" name="dalete" value="Delete"></td>
                </form>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>





@endsection