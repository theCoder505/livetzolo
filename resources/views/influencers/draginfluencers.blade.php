<center>
    <h1 class="font-weight-bold pt-4 text-info"> Change Influencer Positions </h1>
</center>

<h5 class="text-center">Simply drag and drop the row for setting influencer position!...</h5>

<div class="alert alert-info text-center font-weight-bold d-none" id="condition">
</div>





<div class="container">
    <div class="row">
        <div class="col-md-12 p-5">

            <table id="promoteMain" class="table table-striped table-sm table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th class="th-sm">Name</th>
                        <th class="th-sm">Iage</th>
                        <th class="th-sm">Email</th>
                        <th class="th-sm">Link</th>
                        <th class="th-sm">Status</th>
                        <th class="th-sm">Action</th>
                    </tr>
                </thead>



                <tbody id="page_list">


                    @forelse ($getinfluencers as $key => $item)

                        <tr id="{{ $item->id }}">

                            <td class="th-sm"> {{ $item->user_name }} </td>

                            <form action="/edit-user-status" method="post">
                                @csrf

                                <td class="th-sm">
                                    @if ($item->influencer_img_link == '')
                                        <input type="text" name="imageLink" placeholder="Image Link">
                                    @else
                                        <img src="{{ $item->influencer_img_link }}" alt="" class="coinLogo">
                                    @endif
                                </td>


                                <td class="th-sm">
                                    <a href="mailto:{{ $item->user_email }}">
                                        {{ $item->user_email }}
                                    </a>
                                </td>

                                <td class="th-sm">
                                    <input type="text" name="urlLink" value="{{ $item->influencer_url }}">
                                </td>
                                <td class="th-sm">
                                    <input type="hidden" name="userId" value="{{ $item->id }}">
                                    <select name="userStatus" id="userStatus">
                                        <option value="influencer" selected>Influencer</option>
                                        <option value="voter">Voter</option>
                                        <option value="owner">Owner</option>
                                    </select>
                                </td>
                                <td class="th-sm">
                                    <button class="btn btn-info btn-sm">Update</button>
                                    <a href="/delete-user-{{ $item->id }}" class="btn btn-danger btn-sm">
                                        Delete
                                    </a>
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
                    url: "/updateInfluencer",
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
