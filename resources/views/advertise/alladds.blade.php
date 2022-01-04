<center>
    <h1 class="font-weight-bold pt-4 text-danger"> All Advertisements </h1>
</center>





<div class="container">
    <div class="row">
        <div class="col-md-12 p-5">

            <table id="normtoprom" class="table table-striped table-sm table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th class="th-sm">NO</th>
                        <th class="th-sm">Company Name</th>
                        <th class="th-sm">Addvertise Image</th>
                        <th class="th-sm">Redirect Link</th>
                        <th class="th-sm">Addvertise Page</th>
                        <th class="th-sm">Cookie</th>
                        <th class="th-sm">Action</th>
                    </tr>
                </thead>
                <tbody>


                    @forelse ($alladds as $key => $item)

                        <tr>

                            <td class="th-sm">
                                {{ $key + 1 }}
                            </td>

                            <td class="th-sm"> {{ $item->company }} </td>

                            <td class="th-sm">
                                @if ($item->imagelink == '')
                                    <img src="{{ asset($item->rawimage) }}" alt="" class="addvertiseImg">
                                @else
                                    <img src="{{ asset($item->imagelink) }}" alt="" class="addvertiseImg">
                                @endif

                            </td>

                            <td class="th-sm">
                                <a href="{{ $item->redirectlink }}" target="_blank">
                                    {{ $item->redirectlink }}
                                </a>
                            </td>

                            <td class="th-sm">{{ $item->add_location }}</td>

                            <td class="th-sm">
                                {{ $item->cookietime }}
                            </td>

                            <td>
                                <a href="/delete-add-{{ $item->sno }}" class="btn btn-danger btn-sm">
                                    Delete
                                </a>
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
