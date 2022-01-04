<center>
    <h1 class="font-weight-bold pt-4 text-danger"> Promote Coins </h1>
</center>

<h5 class="text-center">To make any coin promoted, first update the coin. Next set coin position</h5>


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

            <table id="normtoprom" class="table table-striped table-sm table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th class="th-sm">NO</th>
                        <th class="th-sm">Coin Image</th>
                        <th class="th-sm">Coin Name</th>
                        <th class="th-sm">Contract Address</th>
                        <th class="th-sm">Total Votes</th>
                        <th class="th-sm">Action</th>
                    </tr>
                </thead>
                <tbody>


                    @forelse ($allcoins as $key => $item)

                        <tr>

                            <td class="th-sm">
                                {{ $key + 1 }}
                            </td>
                            <td class="th-sm">
                                <img src="{{ asset($item->coin_img) }}" alt="" class="coinLogo">
                            </td>
                            <td class="th-sm"> {{ $item->coin_name }} </td>
                            <td class="th-sm">
                                <a href="{{ $item->contract_addr }}" target="_blank">
                                    {{ $item->contract_addr }}
                                </a>
                            </td>
                            <td class="th-sm">{{ $item->votes_total }}</td>

                            <form action="/promote-coin" method="post">
                                @csrf
                                <input type="hidden" name="coinId" value="{{ $item->id }}">
                                <input type="hidden" name="coinname" value="{{ $item->coin_name }}">
                                <input type="hidden" name="coinstatus" value="promoted">
                                <td class="th-sm">
                                    <button class="btn btn-sm btn-info">Promote Coin</button>
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
