<center>
    <h1 class="font-weight-bold pt-4 text-primary"> Promote Coin To Normal Coin </h1>
</center>

<h5 class="text-center">The coin you make normal will not be appeared in promoted list.</h5>


<div class="container">
    <div class="row">
        <div class="col-md-12 p-5">

            <table id="promtonorm" class="table table-striped table-sm table-bordered" cellspacing="0" width="100%">
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


                    @forelse ($promotedcoins as $key => $item)

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

                            <form action="/normalize-coin" method="post">
                                @csrf
                                <input type="hidden" name="coinId" value="{{ $item->id }}">
                                <input type="hidden" name="coinname" value="{{ $item->coin_name }}">
                                <input type="hidden" name="coinstatus" value="normal">
                                <td class="th-sm">
                                    <button class="btn btn-sm btn-dark">Make Normal</button>
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
