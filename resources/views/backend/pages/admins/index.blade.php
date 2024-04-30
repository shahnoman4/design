@extends('backend.layouts.master')

@section('title')
Admins - Admin Panel
@endsection

@section('styles')
    <!-- Datatables -->
    
    <link href="{{ asset('backend/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('backend/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('backend/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('backend/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('backend/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css')}}" rel="stylesheet">
@endsection

@section('admin-content')
<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Users <small>Manage users</small></h3>
      </div>
    </div>

    <div class="clearfix"></div>

    <div class="row" style="display: block;">
      <div class="col-md-12 col-sm-12  ">
        <div class="x_panel">
          <div class="x_title">
            <h2>All Users</h2>
            <p class="float-right mb-2">
                @if (Auth::guard('admin')->user()->can('admin.create'))
                    <a class="btn btn-primary btn-block" href="{{ route('admin.admins.create') }}"><span class="fa fa-plus"></span> Add</a></a>
                @endif
            </p>
            <div class="clearfix"></div>
            @include('backend.layouts.partials.messages')
            
          </div>

          <div class="x_content">
            <div class="table-responsive">
              <table class="table table-striped jambo_table bulk_action" id="dataTable">
                <thead>
                  <tr class="headings">
                    <th class="column-title">Sl </th>
                    <th class="column-title">Name </th>
                    <th class="column-title">Email </th>
                    <th class="column-title">Roles </th>
                    <th class="column-title no-link last"><span class="nobr">Action</span>
                    </th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($admins as $admin)
                   <tr class="even pointer">
                        <td>{{ $loop->index+1 }}</td>
                        <td>{{ $admin->name }}</td>
                        <td>{{ $admin->email }}</td>
                        <td>
                            @foreach ($admin->roles as $role)
                                <span class="badge badge-info">
                                    {{ $role->name }}
                                </span>
                            @endforeach
                        </td>
                        <td>
                            @if (Auth::guard('admin')->user()->can('admin.edit'))
                                <a  href="{{ route('admin.admins.edit', $admin->id) }}"><i class="fa fa-pencil-square-o"></i></a>
                            @endif
                            
                            @if (Auth::guard('admin')->user()->can('admin.delete'))
                            <a  href="{{ route('admin.admins.destroy', $admin->id) }}"
                            onclick="event.preventDefault(); document.getElementById('delete-form-{{ $admin->id }}').submit();">
                                <i class="fa fa-trash-o"></i>
                            </a>
                            <form id="delete-form-{{ $admin->id }}" action="{{ route('admin.admins.destroy', $admin->id) }}" method="POST" style="display: none;">
                                @method('DELETE')
                                @csrf
                            </form>
                            @endif
                        </td>
                    </tr>
                   @endforeach
                </tbody>
              </table>
            </div>
                    
                
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /page content -->
@endsection
@section('scripts')
     <!-- Datatables -->
    <script src="{{ asset('backend/vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('backend/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{ asset('backend/vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{ asset('backend/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js')}}"></script>
    <script src="{{ asset('backend/vendors/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
    <script src="{{ asset('backend/vendors/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{ asset('backend/vendors/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{ asset('backend/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js')}}"></script>
    <script src="{{ asset('backend/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>
    <script src="{{ asset('backend/vendors/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{ asset('backend/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js')}}"></script>
    <script src="{{ asset('backend/vendors/datatables.net-scroller/js/dataTables.scroller.min.js')}}"></script>
    <script src="{{ asset('backend/vendors/jszip/dist/jszip.min.js')}}"></script>
    <script src="{{ asset('backend/vendors/pdfmake/build/pdfmake.min.js')}}"></script>
    <script src="{{ asset('backend/vendors/pdfmake/build/vfs_fonts.js')}}"></script>
     <script>
         /*================================
        datatable active
        ==================================*/
        $( document ).ready(function() {
        if ($('#dataTable').length) {
            $('#dataTable').DataTable();
        }
        });

     </script>
@endsection