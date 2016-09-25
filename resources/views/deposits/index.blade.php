@extends('layout')

@section('title', 'Deposits: '.$customer->name)

@section('content')
    <section>
        <div class="section-body">
            <div class="card">
                <div class="card-head">
                    <header>List of deposits of {{ $customer->name }}</header>
                </div>
                <div class="card-body">
                    @if(auth()->user()->can('save.deposit'))
                        @include('deposits.create')
                    @endif
                    @include('deposits.table')
                </div>
            </div>
        </div>
    </section>
    <div class="modal fade" id="confirm-modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Add Deposit</h4>
                </div>
                <div class="modal-body">
                    Are you sure you want to add a deposit of {{ currency() }}<big><b><span id="deposit-amount"></span></b></big> to
                    <big>{{ $customer->name }}</big>'s account?
                    This cannot be undone.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary btn-confirm-save">Save changes</button>
                </div>
            </div>
        </div>
    </div>
@stop

@push('styles')
<link rel="stylesheet" href="{{ asset('css/libs/DataTables/jquery.dataTables.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/libs/DataTables/TableTools.min.css') }}" />
@endpush

@push('scripts')

<script src="{{ asset('js/libs/jquery-validation/dist/jquery.validate.min.js') }}"></script>
<script src="{{ asset('js/libs/jquery-validation/dist/additional-methods.min.js') }}"></script>
<script src="{{ asset('js/DataTables/datatables.min.js') }}"></script>
<script src="{{ asset('js/pages/dt_deposit.min.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $(document).on('click', '.btn-add', function () {
            $modal = $('#confirm-modal');
            $amount = $('#deposit-amount');
            $form = $('#deposit-form');

            if ($form.valid()) {
                $amount.text($('.entered-amount').val());
                $modal.modal();
            }
        });
        $(document).on('click', '.btn-confirm-save', function () {
            $form = $('#deposit-form');
            if ($form.valid())
                $form.submit();
        });
    });
</script>
@endpush
