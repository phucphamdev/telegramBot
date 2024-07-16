<x-base-layout>

    <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
        <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-6 mb-md-5 mb-xl-10">

            {{ theme()->getView('pages/system/vietcombank/_system-details', array('class' => 'mb-5 mb-xl-3', 'info' => $info,'info2' => auth()->user()->info)) }}

        </div>
    </div>

</x-base-layout>
