@forelse ($getParticularCoin as $key => $item)



    <form action="/update-coin" method="POST" enctype="multipart/form-data">

        @csrf


        <input type="hidden" name="coinUniqueId" id="coinUniqueId" value="{{ $coinId }}">


        @if ($item->img)
            <div>
                <button class="floatRight" onclick="crossItem(this)">
                    <span aria-hidden="true">×</span>
                </button>
                <center>
                    <img src="{{ asset($item->img) }}" alt="" id="coinLogo">
                </center>
                <input type="hidden" name="imgLocation" value="{{ $item->img }}">
            </div>
        @endif

        <input type="hidden" name="upsno" id="upsno" value="{{ $coinSno }}">



        @if ($item->name)
            <div class="form-group mt-3">
                <label for="addedCoinName">Coin Name*</label>
                <button class="floatRight" onclick="crossItem(this)">
                    <span aria-hidden="true">×</span>
                </button>
                <input type="text" class="form-control" value="{{ $item->name }}" name="coinName" id="addedCoinName"
                    placeholder="Bitcoin">
            </div>
        @endif

        @if ($item->symbol)
            <div class="form-group">
                <label for="addedcoinSymbol">Symbol*</label>
                <button class="floatRight" onclick="crossItem(this)">
                    <span aria-hidden="true">×</span>
                </button>
                <input type="text" class="form-control" name="coinSymbol" value="{{ $item->symbol }}"
                    id="addedcoinSymbol" placeholder="BTC">
            </div>
        @endif

        @if ($item->network)
            <div class="form-group">
                <label for="addednetwork">Network/Chain</label>
                <button class="floatRight" onclick="crossItem(this)">
                    <span aria-hidden="true">×</span>
                </button>
                <select class="form-control" name="network" id="network">
                    <option value="{{ $item->network }}" id="selectedSlct" disabled selected="">{{ $item->network }}
                    </option>
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
        @endif


        @if ($item->phase)
            <label for="">
                Project in presale phase?
            </label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="presalePhase" id="presalePhase"
                    value="{{ $item->phase }}">
                <label class="form-check-label" for="inlineRadio1">{{ $item->phase }}</label>
                <button class="floatRight" onclick="crossItem(this)">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
        @endif


        @if ($item->launch)
            <div class="form-group">
                <label for="addedlaunchDate">Launch Date*</label>
                <button class="floatRight" onclick="crossItem(this)">
                    <span aria-hidden="true">×</span>
                </button>
                <input type="date" class="form-control" value="{{ $item->launch }}" name="launchDate"
                    id="addedlaunchDate">
            </div>
        @endif

        @if ($item->contract)
            <div class="form-group mt-2">
                <label for="addedcontractAddr">Contract Address</label>
                <button class="floatRight" onclick="crossItem(this)">
                    <span aria-hidden="true">×</span>
                </button>
                <input type="text" class="form-control" value="{{ $item->contract }}" name="contractAddr"
                    id="addedcontractAddr" placeholder="0xB8c77482e45F1F44dE1745F52C74426C631bDD52">
            </div>
        @endif


        @if ($item->description)
            <div class="form-group">
                <label for="descText">Description</label>
                <button class="floatRight" onclick="crossItem(this)">
                    <span aria-hidden="true">×</span>
                </button>
                <textarea class="form-control" name="desc" value="{{ $item->description }}" id="descText"
                    rows="10"></textarea>
            </div>
        @endif



        @if ($item->chart)
            <div class="form-group">
                <label for="descText">Bogged chart link</label>
                <button class="floatRight" onclick="crossItem(this)">
                    <span aria-hidden="true">×</span>
                </button>
                <input type="text" class="form-control" value="{{ $item->chart }}" name="boggedLink"
                    id="addedboggedLink" placeholder="https://dex.guru/token/0x....">
            </div>
        @endif





        @if ($item->swap)
            <div class="form-group">
                <label for="addedswapLink">Custom swap link (PanecakeSwap)</label>
                <button class="floatRight" onclick="crossItem(this)">
                    <span aria-hidden="true">×</span>
                </button>
                <input type="text" class="form-control" value="{{ $item->swap }}" name="swapLink"
                    id="addedswapLink" placeholder="https://apeswap.finance/...">
            </div>
        @endif



        @if ($item->web)
            <div class="form-group">
                <label for="addedwebLink">Website link*</label>
                <button class="floatRight" onclick="crossItem(this)">
                    <span aria-hidden="true">×</span>
                </button>
                <input type="text" class="form-control" value="{{ $item->web }}" name="webLink" id="addedwebLink"
                    placeholder="https://goole.com">
            </div>
        @endif

        @if ($item->tel)
            <div class="form-group">
                <label for="addedtelLink">Telegram link*</label>
                <button class="floatRight" onclick="crossItem(this)">
                    <span aria-hidden="true">×</span>
                </button>
                <input type="text" class="form-control" value="{{ $item->tel }}" name="telLink" id="addedtelLink"
                    placeholder="https://t.me/coingroup">
            </div>
        @endif

        @if ($item->twit)
            <div class="form-group">
                <label for="addedtwitLink">Twitter link</label>
                <button class="floatRight" onclick="crossItem(this)">
                    <span aria-hidden="true">×</span>
                </button>
                <input type="text" class="form-control" value="{{ $item->twit }}" name="twitLink"
                    id="addedtwitLink" placeholder="https://twitter.com/coingroup">
            </div>
        @endif

        @if ($item->discord)
            <div class="form-group">
                <label for="addeddiscordLink">Discord link</label>
                <button class="floatRight" onclick="crossItem(this)">
                    <span aria-hidden="true">×</span>
                </button>
                <input type="text" class="form-control" value="{{ $item->discord }}" name="discordLink"
                    id="addeddiscordLink" placeholder="https://discord.gg/coingroup">
            </div>
        @endif

        <center>
            <button class="btn px-5 btn-primary btn-sm btn-block my-3">UPDATE</button>
        </center>

    </form>


@empty

@endforelse
