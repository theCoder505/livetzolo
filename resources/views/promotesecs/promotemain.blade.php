<center>
    <h1 class="font-weight-bold pt-4 text-info"> Change Promotion Positions </h1>
</center>

<h5 class="text-center">Simply drag and drop the row for setting promote list!...</h5>

<div class="alert alert-info text-center font-weight-bold d-none" id="condition">
</div>







<div class="container">
    <div class="row">
        <div class="col-md-12 p-5">

            <table id="promoteMain" class="table table-striped table-sm table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th class="th-sm">Logo</th>
                        <th class="th-sm">Name</th>
                        <th class="th-sm">Contract Address</th>
                        <th class="th-sm">Total Votes</th>
                        <th class="th-sm">Status</th>
                        <th class="th-sm">Created At</th>
                    </tr>
                </thead>



                <tbody id="page_list">


                    @forelse ($getCoins as $key => $item)

                        <tr id="{{ $item->id }}">

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
                            <td class="th-sm">{{ $item->status }}</td>
                            <td class="th-sm">{{ $item->time }}</td>

                        </tr>

                    @empty
                        <h1 class="text-center text-danger font-weight-bold">
                            No Coins Yet!
                        </h1>
                    @endforelse

                </tbody>
            </table>
            <input type="hidden" name="page_order_list" id="page_order_list" />
        </div>
    </div>
</div>

{{-- promote | all coins | promoted coins --}}



<script>
    $(document).ready(function() {
        $("#page_list").sortable({
            placeholder: "ui-state-highlight",
            update: function(event, ui) {
                var page_id_array = new Array();
                $('#page_list tr').each(function() {
                    page_id_array.push($(this).attr("id"));
                });
                $.ajax({
                    url: "/updatelist",
                    method: "POST",
                    data: {
                        page_id_array: page_id_array,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(data) {
                        $("#condition").removeClass("d-none");
                        $("#condition").html(data);
                    }
                });
            }
        });

    });
</script>
