@extends('layout.app')

@section('content')

    <h1 class="text-center font-weight-bold text-danger mt-5">
        All Submitted Coins Of Your Site
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


                        @forelse ($getCoins as $key => $item)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td class="th-sm">
                                    <img src="{{ asset($item->coin_img) }}" alt="" class="coinLogo">
                                </td>
                                <td class="th-sm"> {{ $item->coin_name }} </td>
                                <td class="th-sm">{{ $item->votes_total }}</td>
                                <td class="th-sm">{{ $item->status }}</td>
                                <td class="th-sm">
                                    <button class="btn btn-sm btn-primary" id="edit{{ $item->id }}"
                                        onclick="editCoin({{ $item->id }})">Edit</button>
                                </td>
                                <td class="th-sm">
                                    <button class="btn btn-sm btn-danger"
                                        onclick="deleteCoin({{ $item->id }})">Delete</button>
                                </td>
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
                    <h5 class="modal-title text-light" id="staticBackdropLabel">Edit Coin Informations</h5>
                    <button type="button" class="close text-light editCross" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>


                <div class="modal-body">


                    <div id="submitHolder">

                        <form action="/edit-coin-from-all-coin-page" method="POST" enctype="multipart/form-data">

                            @csrf


                            <input type="hidden" name="coinUniqueId" id="coinUniqueId" value="">

                            <center>
                                <img src="{{ asset('webimages/upimg.png') }}" alt="" id="coinLogo">
                            </center>


                            <div class="mt-3">
                                <label for="addedCoinLogo"> Upload Coin Logo* [ jpg/ png/ jpeg/ gif ] </label><br>
                                <small class="text-warning">Use 387 X 387 Image for Logo</small><br>

                                <input type="file" name="addProfileImg" class="form-control" id="addProfileImg"
                                    accept="image/*" onchange="showProfile(event)">
                                <img src="" alt="" class="d-none imgSizeChecker">
                            </div>



                            <div class="form-group mt-3">
                                <label for="addedCoinName">Coin Name*</label>
                                <input type="text" class="form-control" name="coinName" id="addedCoinName"
                                    placeholder="Bitcoin">
                            </div>

                            <div class="form-group">
                                <label for="addedcoinSymbol">Symbol*</label>
                                <input type="text" class="form-control" name="coinSymbol" id="addedcoinSymbol"
                                    placeholder="BTC">
                            </div>

                            <div class="form-group">
                                <label for="addednetwork">Network/Chain</label>
                                <select class="form-control" name="network" id="network">
                                    <option value="" id="selectedSlct" disabled selected=""></option>
                                    <option value="bsc">Binance Smart Chain (BSC)</option>
                                    <option value="eth">Ethereum (ETH)</option>
                                    <option value="matic">Polygon (MATIC)</option>
                                    <option value="trx">Tron (TRX)</option>
                                    <option value="ftm">Fantom (FTM)</option>
                                    <option value="sol">Solana (SOL)</option>
                                    <option value="kcc">Kucoin Chain (KCC)</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>

                            <label for="">
                                Project in presale phase? ==> <span class="text-danger" id="phase">[ ]</span>
                            </label>
                            <br>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="presalePhase" id="presalePhase"
                                    value="yes">
                                <label class="form-check-label" for="inlineRadio1">Yes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="presalePhase" id="presalePhase"
                                    value="no">
                                <label class="form-check-label" for="inlineRadio2">No</label>
                            </div>


                            <div class="form-group">
                                <label for="addedlaunchDate">Launch Date*</label>
                                <input type="date" class="form-control" name="launchDate" id="addedlaunchDate">
                            </div>

                            <div class="form-group mt-2">
                                <label for="addedcontractAddr">Contract Address</label>
                                <input type="text" class="form-control" name="contractAddr" id="addedcontractAddr"
                                    placeholder="0xB8c77482e45F1F44dE1745F52C74426C631bDD52">
                            </div>


                            <div class="form-group">
                                <label for="descText">Description</label>
                                <textarea class="form-control" name="desc" id="descText" rows="10"></textarea>
                            </div>


                            <div class="tokenVal borderWhite">
                                <p class="text-light">
                                    Token Value:
                                </p>
                                <div class="form-group">
                                    <label for="descText">MarketCap</label>
                                    <input type="text" class="form-control" name="marketCap" id="addedmarketCap"
                                        placeholder="https://dex.guru/token/0x....">
                                </div>

                                <div class="form-group">
                                    <label for="descText">Price (USD) </label>
                                    <input type="text" class="form-control" name="priceusd" id="addedpriceusd"
                                        placeholder="https://dex.guru/token/0x....">
                                </div>
                            </div>


                            <div class="charts borderWhite">
                                <p class="text-light">
                                    Charts / Prices Links:
                                </p>

                                <div class="form-group">
                                    <label for="descText">Bogged chart link</label>
                                    <input type="text" class="form-control" name="boggedLink" id="addedboggedLink"
                                        placeholder="https://dex.guru/token/0x....">
                                </div>

                                <div class="form-group">
                                    <label for="descText">Coin Market link</label>
                                    <input type="text" class="form-control" name="coinmrkt" id="addedcoinmrkt"
                                        placeholder="https://dex.guru/token/0x....">
                                </div>

                                <div class="form-group">
                                    <label for="descText">CoinGeko Link</label>
                                    <input type="text" class="form-control" name="coinGeko" id="addedcoinGeko"
                                        placeholder="https://dex.guru/token/0x....">
                                </div>

                                <div class="form-group">
                                    <label for="descText">Poocoin Link</label>
                                    <input type="text" class="form-control" name="pooCoin" id="addedpooCoin"
                                        placeholder="https://dex.guru/token/0x....">
                                </div>

                            </div>


                            <div class="buynow borderWhite">
                                <p class="text-light">
                                    Buy Now Links:
                                </p>

                                <div class="form-group">
                                    <label for="addedswapLink">Custom swap link (PanecakeSwap)</label>
                                    <input type="text" class="form-control" name="swapLink" id="addedswapLink"
                                        placeholder="https://apeswap.finance/...">
                                </div>

                                <div class="form-group">
                                    <label for="addedfloozTrade">FloozTrade link (FloozTrade)</label>
                                    <input type="text" class="form-control" name="floozTrade" id="addedfloozTrade"
                                        placeholder="https://www.flooz.trade/wallet/0x5a1...">
                                </div>

                            </div>

                            <div class="borderWhite socialLinks">
                                <p class="text-light">
                                    Social Links:
                                </p>

                                <div class="form-group">
                                    <label for="addedwebLink">Website link*</label>
                                    <input type="text" class="form-control" name="webLink" id="addedwebLink"
                                        placeholder="https://goole.com">
                                </div>

                                <div class="form-group">
                                    <label for="addedtelLink">Telegram link*</label>
                                    <input type="text" class="form-control" name="telLink" id="addedtelLink"
                                        placeholder="https://t.me/coingroup">
                                </div>

                                <div class="form-group">
                                    <label for="addedtwitLink">Twitter link</label>
                                    <input type="text" class="form-control" name="twitLink" id="addedtwitLink"
                                        placeholder="https://twitter.com/coingroup">
                                </div>

                                <div class="form-group">
                                    <label for="addeddiscordLink">Discord link</label>
                                    <input type="text" class="form-control" name="discordLink" id="addeddiscordLink"
                                        placeholder="https://discord.gg/coingroup">
                                </div>
                            </div>

                            <center>
                                <button class="btn px-5 btn-success btn-sm btn-block">COMPLETE</button>
                            </center>

                        </form>


                    </div>


                </div>

            </div>
        </div>
    </div>



    <script>$(".account").addClass("activated"); </script>
@endsection
