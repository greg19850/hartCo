 @extends('layouts.cmsLayout')

 @section('content')
 <form id='add_sub_menu_form' name='add_sub_menu_form' class="add-sub-menu-form" method="POST" action="{{route('cms.addSubMenu' , $menu->id)}}">
     @csrf
     <div class="">
         <div class="add-sub-menu-header">
             <h1 class="title fs-5">Add Menu Category</h1>
         </div>
         <hr />
         <div class="row mb-3">
             <div class="col">
                 <label for="name" class="form-label">Catregory name</label>
                 <input type="text" class="form-control" name='name' aria-label="Category name" @error('name') is-invalid @enderror>
                 @error('name')
                 <small class="pt-1" style="color: red">{{ $message }}</small>
                 @enderror
             </div>
             <div class="col row">
                 <div class="col-auto">
                     <label for="price" class="form-label">Catregory price (optonal)</label>
                     <input type="number" step="0.01" class="form-control" name='price' aria-label="Category price">
                 </div>
                 <div class="col-auto form-check">
                     <input class="pp-check" type="checkbox" id="pp_check" name="pp_check">
                     <label class="form-check-label" for="pp_check">
                         Per person?
                     </label>
                 </div>
             </div>

         </div>
         <div class="row mb-3">
             <div class="col">
                 <label for="description" class="form-label">Catregory description (optional)</label>
                 <textarea class="form-control" id="description" name='description' rows="3"></textarea>
             </div>
         </div>
     </div>
     <button type="submit" class="btn submit-rule-btn btn-primary">Add Menu Category</button>
 </form>

 <script>

 </script>
 @endsection