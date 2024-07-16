<x-base-layout>

	{{ theme()->getView('pages/system/_system-details', array('class' => 'mb-5 mb-xl-10', 'info' => $info,'info2' => auth()->user()->info)) }}

</x-base-layout>
