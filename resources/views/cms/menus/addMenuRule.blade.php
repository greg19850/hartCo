 @extends('layouts.cmsLayout')

 @section('content')
 <form id='add_rules_form' name='add_rules_form' class="add-rules-form" method="POST" action="{{route('cms.addMenuRules' , $menu->id)}}">
     @csrf
     <div class="">
         <div class="add-rule-header">
             <h1 class="title fs-5">Add Menu Rules</h1>
         </div>
         <hr />
         <div class="form-group pb-2" @error('rule_data') is-invalid @enderror>
             <textarea id="summernote" name="rule_data"></textarea>
         </div>

         <div class="add-rule-footer d-flex align-items-center justify-content-between">
             <div class="px-2">
                 @error('rule_data')
                 <small class="pt-1" style="color: red">{{ $message }}</small>
                 @enderror
             </div>
             <div class="controls d-flex align-items-center">
                 <div class="spinner-rule spinner-border me-3" role="status">
                     <span class="visually-hidden">Loading...</span>
                 </div>
                 <a href="{{route('cms.editMenu', $menu->id)}}" class="btn cancel-btn btn-secondary me-3">Cancel</a>
                 <button type="submit" class="btn submit-rule-btn btn-primary">Add Rules</button>
             </div>
         </div>
     </div>
 </form>

 <script>
     $(document).ready(function() {
         $('#summernote').summernote({
             placeholder: 'Write your menu rules here',
             tabsize: 2,
             height: 200,
             lineHeights: ['0.2', '0.5', '1.0', '1.2', '1.5', '2.0', '3.0'],
             toolbar: [
                 ['style', ['bold', 'underline', 'clear']],
                 ['font', ['strikethrough', 'superscript', 'subscript']],
                 ['fontname', ['fontname']],
                 ['fontsize', ['fontsize']],
                 ['color', ['color']],
                 ['para', ['ul', 'ol', 'paragraph']], , ['table', ['table']],
                 ['insert', ['link']],
                 ['height', ['height']],
                 ['view', ['help']]
             ]
         });
     });

     // Submit form with rules
     const form = document.getElementById('add_rules_form')
     const spinner = document.querySelector('.spinner-rule')
     const submitBtn = document.querySelector('.submit-rule-btn')
     const cancelRuleBtn = document.querySelector('.cancel-btn')

     const submitRules = (e) => {
         e.preventDefault()

         spinner.classList.add('active')
         submitBtn.disabled = true
         cancelRuleBtn.disabled = true

         //let markupStr = $('#summernote').summernote('code');

         setTimeout(function() {
             form.submit();
         }, 500);

     }

     form.addEventListener('submit', submitRules)
 </script>
 @endsection
