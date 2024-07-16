<x-base-layout>

    <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
        <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-6 mb-md-5 mb-xl-10">

            {{ theme()->getView('pages/system/system/_system-details', array('class' => 'mb-5 mb-xl-3', 'info' => $info,'info2' => auth()->user()->info)) }}

            {{ theme()->getView('pages/system/mbbank/_system-details', array('class' => 'mb-5 mb-xl-3', 'info' => $info,'info2' => auth()->user()->info)) }}

            {{ theme()->getView('pages/system/acbank/_system-details', array('class' => 'mb-5 mb-xl-3',  'info' => $info)) }}

            {{ theme()->getView('pages/system/vpbank/_system-details', array('class' => 'mb-5 mb-xl-3', 'data' => $info)) }}

            {{ theme()->getView('pages/system/tpbank/_system-details', array('class' => 'mb-5 mb-xl-3', 'data' => $info)) }}

        </div>

        <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-6 mb-md-5 mb-xl-10">
            {{ theme()->getView('pages/system/vietcombank/_system-details', array('class' => 'mb-5 mb-xl-3', 'info' => $info,'info2' => auth()->user()->info)) }}

            {{ theme()->getView('pages/system/momo/_system-details', array('class' => 'mb-5 mb-xl-3', 'momo' => $momo)) }}

            {{ theme()->getView('pages/system/viettelpay/_system-details', array('class' => 'mb-5 mb-xl-3',  'data' => $info)) }}



        </div>
    </div>

</x-base-layout>