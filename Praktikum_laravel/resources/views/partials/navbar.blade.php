<nav class="flex items-center gap-2 bg-indigo-700/50 p-1.5 rounded-xl backdrop-blur-sm border border-indigo-500/30">
    <a href="{{ route('mahasiswa.index') }}" 
       class="px-4 py-2 text-sm font-medium rounded-lg transition-all duration-200 {{ request()->routeIs('mahasiswa.*') ? 'bg-white text-indigo-700 shadow-sm font-semibold' : 'text-indigo-100 hover:bg-indigo-500/50 hover:text-white' }}">
        🎓 Data Mahasiswa
    </a>
    <a href="{{ route('matakuliah.index') }}" 
       class="px-4 py-2 text-sm font-medium rounded-lg transition-all duration-200 {{ request()->routeIs('matakuliah.*') ? 'bg-white text-indigo-700 shadow-sm font-semibold' : 'text-indigo-100 hover:bg-indigo-500/50 hover:text-white' }}">
        📚 Data Mata Kuliah
    </a>
</nav>