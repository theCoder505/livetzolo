@extends('layout.app')

@section('content')

    <h1 class="text-center font-weight-bold text-primary mt-5">
        All Update Requests
    </h1>

    <center>
        @if (session()->has('errormsg'))
            <div class="alert alert-danger text-center alert-dismissible fade show" role="alert">
                {{ session()->get('errormsg') }}
            </div>
        @endif
    </center>

    <center>
        @if (session()->has('successmsg'))
            <div class="alert alert-success text-center alert-dismissible fade show" role="alert">
                {{ session()->get('successmsg') }}
            </div>
        @endif
    </center>

    <div class="container">
        <div class="row">
            <div class="col-md-12 p-5">
                <table id="allCoinsData" class="table table-striped table-sm table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th class="th-sm">NO</th>
                            <th class="th-sm">Logo</th>
                            <th class="th-sm">Name</th>
                            <th class="th-sm">Total Votes</th>
                            <th class="th-sm">Status</th>
                            <th class="th-sm">Edit</th>
                            <th class="th-sm">Delete</th>
                        </tr>
                    </thead>
                    <tbody id="tbodyData">


                        <div id="Loader" class="d-none">
                            <div class="container">
                                <div class="row text-center">
                                    <div class="centered">
                                        <div class="blob-1"></div>
                                        <div class="blob-2"></div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        @forelse ($joined as $key => $item)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td class="th-sm">
                                    <img src="{{ asset($item->coin_img) }}" alt="" class="coinLogo">
                                </td>
                                <td class="th-sm"> {{ $item->coin_name }} </td>
                                <td class="th-sm">{{ $item->votes_total }}</td>
                                <td class="th-sm">{{ $item->status }}</td>
                                <td class="th-sm">
                                    <button class="btn btn-sm btn-primary" id="edit{{ $item->sno }}"
                                        onclick="upPageEditCoin({{ $item->sno }})">Edit</button>
                                </td>
                                <td class="th-sm">
                                    <button class="btn btn-sm btn-danger"
                                        onclick="cancelRequest({{ $item->sno }})">Cancel</button>
                                </td>
                            </tr>
                        @empty
                            <div class="alert alert-danger text-center">
                                <h3 class="text-center font-weight-bold">
                                    No Coins Yet!
                                </h3>
                            </div>
                        @endforelse

                    </tbody>
                </table>

            </div>
        </div>
    </div>




    <!-- Modal -->
    <div class="modal fade" id="deletingModal" tabindex="-1" role="dialog" aria-labelledby="deletingModalTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content bg-dark">
                <div class="modal-header">
                    <center>
                        <h5 class="modal-title font-weight-bold text-danger" id="exampleModalLongTitle">Notice:</h5>
                    </center>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-danger text-center">
                    Once You delete any coin, it will permanently removed from your site.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" id="permanentDelete">Continue</button>
                </div>
            </div>
        </div>
    </div>







    <div class="modal fade pb-3 modal-dialog-scrollable" id="scrollable" data-backdrop="static" data-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content bg-dark">
                <div class="modal-header">
                    <h5 class="modal-title text-light" id="staticBackdropLabel">Information Wanna Update </h5>
                    <button type="button" class="close text-light editCross" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>


                <div class="modal-body">


                    <div id="submitHolder"></div>


                </div>

            </div>
        </div>
    </div>

<script>$(".upreq").addClass("activated"); </script>
@endsection
