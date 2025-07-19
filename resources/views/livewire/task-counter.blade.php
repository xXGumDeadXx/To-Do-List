<div class="flex mb-6 p-4 bg-gray-100 dark:bg-gray-800 rounded-lg flex-col items-end">
    <h3 class="font-bold w-full text-center md:text-left md:w-auto text-gray-900 dark:text-gray-100">Tareas Totales</h3>
    <div class="flex gap-5">
        <span class="text-green-700 dark:text-green-400">Completadas: {{ $counts['completed'] }}</span>
        <span class="text-yellow-700 dark:text-yellow-400">Pendientes: {{$counts['pending']}}</span>
        <span class="text-red-700 dark:text-red-400">Atrasadas: {{$counts['overdue']}}</span>
    </div>
</div>
