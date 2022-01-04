@extends('layout.app')

@section('content')

    {{-- msg --}}

    <center>
        @if (session()->has('msg'))
            <div class="alert {{ session()->get('type') }} text-center alert-dismissible fade show" role="alert">
                {{ session()->get('msg') }}
            </div>
        @endif
    </center>

    <div class="container">
        <div class="row">
            <div class="col-md-12 p-5">

                <h1 class="text-center font-weight-bold text-dark my-3">
                    All Users Control
                </h1>

                <table id="allCoinsData" class="table table-striped table-sm table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th class="th-sm">NO</th>
                            <th class="th-sm">User Name</th>
                            <th class="th-sm">User Email</th>
                            <th class="th-sm">User Type</th>
                            <th class="th-sm">Change</th>
                            <th class="th-sm">Member Since</th>
                            <th class="th-sm">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @forelse ($allusers as $key => $item)


                            <tr>
                                <td class="th-sm">{{ $key + 1 }}</td>
                                <td class="th-sm">{{ $item->user_name }}</td>
                                <td class="th-sm">
                                    <a href="mailto:{{ $item->user_email }}">
                                        {{ $item->user_email }}
                                    </a>
                                </td>
                                <td class="th-sm">{{ $item->user_type }}</td>
                                <form action="/edit-user-type" method="post">
                                    <td class="th-sm">
                                        @csrf
                                        <input type="hidden" name="userId" value="{{ $item->id }}">
                                        <input type="hidden" name="userMail" value="{{ $item->user_email }}">
                                        <select name="userType" id="userType" required>
                                            <option value="voter" selected>Voter</option>
                                            <option value="influencer">Influencer</option>
                                            <option value="owner">Coin Owner</option>
                                        </select>
                                    </td>
                                    <td class="th-sm">{{ $item->member_from }}</td>
                                    <td class="th-sm">
                                        <button class="btn btn-sm btn-success">
                                            Update
                                        </button>
                                    </td>
                                </form>
                            </tr>

                        @empty
                            <h1 class="text-center text-danger font-weight-bold">
                                No Coins Yet!
                            </h1>
                        @endforelse


                    </tbody>
                </table>

            </div>
        </div>
    </div>



<script>$(".alluser").addClass("activated"); </script>

@endsection
