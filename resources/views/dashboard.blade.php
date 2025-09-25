<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div >
                <x-alert type="success" message="You're logged in!" />

            </div>
        </div>
        <div>
           <x-dashboard-table 
                title="Top 10 Drugs by Usage" 
                :items="$topDrugsUsage" 
                :columns="['Drug','Times Used']" 
            />

            <x-dashboard-table 
                title="Top 10 Drugs Near Expiry" 
                :items="$expiringDrugs" 
                :columns="['Drug','Expiry Date']" 
            />

            <x-dashboard-table 
                title="Top 10 Drugs Low in Stock" 
                :items="$lowStockDrugs" 
                :columns="['Drug','Quantity']" 
            />

            <x-dashboard-table 
                title="Suppliers with Payment Due This Month" 
                :items="$suppliersDue" 
                :columns="['Supplier','Amount Due']" 
            />

            <x-dashboard-table 
                title="Top 10 Patients by Debt" 
                :items="$patientsDebt" 
                :columns="['Patient','Amount Owed']" 
            />

        </div>
    </div>
</x-app-layout>
