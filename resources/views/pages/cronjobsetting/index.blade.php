<x-base-layout>

    <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
        <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-md-5 mb-xl-12">

            {{ theme()->getView('pages/cronjobsetting/_system-details', array('class' => 'mb-5 mb-xl-3', 'info' => $info, 'object' => $object) ) }}

        </div>

    </div>

</x-base-layout>