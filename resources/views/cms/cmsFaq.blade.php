@extends('layouts.cmsLayout')

@section('content')
    <div class="cms-faq">
        <div class="faq-header d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Add next question and answer</h4>
        </div>
        <hr />
        <form class="faq-form mb-5" method="POST" action="{{route('cms.addQuestion')}}">
            @csrf
            <div class="mb-3">
                <label for="faq_question" class="form-label">Question</label>
                <input type="text" class="form-control" id="faq_question" name="question" aria-describedby="faq_question" @error('question') is-invalid @enderror>
                @error('question')
                <small class="pt-1" style="color: red; float: right">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="faq_answer" class="form-label">Answer</label>
                <input type="text" class="form-control" id="faq_answer" name="answer" aria-describedby="faq_answer" @error('answer') is-invalid @enderror>
                @error('answer')
                <small class="pt-1" style="color: red; float: right">{{ $message }}</small>
                @enderror
            </div>
            <div class="faq-submit d-flex align-items-center">
                <button type="submit" class="submit-question btn btn-primary me-4">Submit</button>
                <div class="spinner-faq spinner-border" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
        </form>
        <div class="faq-list-header d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Current Questions List</h4>
        </div>
        <hr />
        @if(!count($faqList))
            <div>Add first question to the list</div>
        @else
            @foreach($faqList as $faq)
                <div class="faq-item">
                    <div class="faq-item-header mb-3">
                        <div class="faq-question">
                            {{$faq->question}}
                        </div>
                        <form id="menuItemsDeleteForm" class="faq-item-controls" method="POST" action="{{route('cms.deleteQuestion', $faq->id)}}">
                            @csrf
                            @method('delete')
                            <button type="button" class="btn edit-faq-item btn-warning" data-bs-toggle="modal" data-bs-target="#faq-edit-item-modal{{$faq->id}}"  data-faq-question="{{$faq->question}}" data-faq-answer="{{$faq->answer}}"><i class="bi bi-pencil-square"></i></button>
                            <button type="submit" class="btn btn-danger"><i class="bi bi-trash3"></i></button>
                        </form>
                    </div>
                    <div class="faq-item-answer">
                        {{$faq->answer}}
                    </div>
                </div>
                <hr />
                <div class="modal fade faq-edit-modal" id="faq-edit-item-modal{{$faq->id}}" tabindex="-1"
                     aria-labelledby="faq-edit-item-modal" aria-hidden="true">
                    <div class="modal-dialog">
                        <form class="faq_edit_form mb-5" method="POST" action="{{route('cms.editQuestion', $faq->id)}}">
                            <div class="modal-content">
                                <div class="modal-body">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="faq_edit_question" class="form-label">Question</label>
                                        <input type="text" class="form-control" id="faq_edit_question" name="question" value="{{$faq->question}}"
                                               aria-describedby="faq_edit_question" @error('question') is-invalid @enderror>
                                        @error('question')
                                        <small class="pt-1" style="color: red; float: right">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="faq_edit_answer" class="form-label">Answer</label>
                                        <input type="text" class="form-control" id="faq_edit_answer" name="answer" value="{{$faq->answer}}"
                                               aria-describedby="faq_edit_answer" @error('answer') is-invalid @enderror>
                                        @error('answer')
                                        <small class="pt-1" style="color: red; float: right">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <div class="spinner-faq-edit spinner-border" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                    <button type="button" class="btn btn-secondary cancel-update-btn ms-3" data-bs-dismiss="modal">Close
                                    </button>
                                    <button type="submit" class="btn btn-primary update-faq-btn">Save changes</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            @endforeach
        @endif
    </div>

    <script>
        @if(session('success'))
            toastr.options = {
            'closeButton': true,
            'timeOut': 1500,
            'positionClass': 'toast-bottom-right'
        }
        toastr.success("{{Session::get('success')}}");
        @endif

        const submitQuestionForm = document.querySelector('.faq-form')
        const submitFaqBtn = document.querySelector('.submit-question')
        const spinnerFaq = document.querySelector('.spinner-faq')

        const submitQuestion = (e) =>
        {
            e.preventDefault()

            submitFaqBtn.disabled = true;
            spinnerFaq.classList.add('active')

            setTimeout(function() {
                submitQuestionForm.submit();
            }, 1000);
        }
        submitQuestionForm.addEventListener('submit', submitQuestion)

        const updateQuestionForm = document.querySelector('.faq_edit_form')
        const updateQuestionBtn = document.querySelector('.update-faq-btn')
        const cancelBtn = document.querySelector('.cancel-update-btn')
        const editSpinner = document.querySelector('.spinner-faq-edit')

        const updateQuestion = (e) =>
        {
            e.preventDefault()

            updateQuestionBtn.disabled = true;
            cancelBtn.disabled = true;
            editSpinner.classList.add('active')

            setTimeout(function() {
                updateQuestionForm.submit();
            }, 1000);
        }
        updateQuestionForm.addEventListener('submit', updateQuestion)
    </script>
@endsection
