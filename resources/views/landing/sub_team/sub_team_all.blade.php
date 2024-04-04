@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">All Sub-Team</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">All Sub-Team</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <a href="{{ route('add.landing.sub_team') }}" class="btn btn-primary">Add Sub-Team</a>
                </div>
            </div>
        </div>
        <!--end breadcrumb-->

        <hr />
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Sub-Team Name </th>
                                <th>Sub-Team Designation</th>
                                <th>Sub-Team Paragraph</th>
                                <th>Sub-Team Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sub_teams as $key => $item)
                                <tr>
                                    <td> {{ $key + 1 }} </td>
                                    <td>{{ $item->landing_sub_team_name }}</td>
                                    <td>{{ $item->landing_sub_team_designation }}</td>
                                    <td>{{ $item->landing_sub_team_paragraph }}</td>
                                    <td> <img src="{{ asset($item->landing_sub_team_image) }}"
                                            style="width: 70px; height:40px;">
                                    </td>

                                    <td>
                                        {{-- @if (Auth::user()->can('slider.edit'))
                                            <a href="{{ route('edit.landing.sub_team', $item->id) }}"
                                                class="btn btn-info">Edit</a>
                                        @endif --}}
                                        @if (Auth::user()->can('slider.delete'))
                                            <a href="{{ route('delete.landing.sub_team', $item->id) }}" class="btn btn-danger"
                                                id="delete">Delete</a>
                                        @endif

                                    </td>
                                </tr>
                            @endforeach


                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Sl</th>
                                <th>Sub-Team Name </th>
                                <th>Sub-Team Designation</th>
                                <th>Sub-Team Paragraph</th>
                                <th>Sub-Team Image</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>



    </div>
@endsection
