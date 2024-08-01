<x-layout-app page-title="Home">

    <div class="w-100 p-4">

        <h3>Home</h3>

        <hr>

        <x-info-title-value item-title="Total colaborators" :item-value="$data['total_colaborators']" />
        <x-info-title-value item-title="Total deleted colaborators" :item-value="$data['total_colaborators_deleted']" />
        <x-info-title-value item-title="Total salary" :item-value="$data['total_salary']" />

    </div>

</x-layout-app>