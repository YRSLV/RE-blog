<div class="flex mt-4 md:mt-0 items-center text-gray-700">
    @if ($paginator->hasPages())
            
        @if (!$paginator->onFirstPage())
            {{-- First Page Link --}}
            <div wire:click="gotoPage(1)" wire:key="chevronsLeft" class="h-8 md:h-12 w-8 md:w-12  flex justify-center items-center rounded-full bg-indigo-500 hover:bg-indigo-800 cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevrons-left w-3 md:w-6 h-3 md:h-6">
                    <polyline points="11 17 6 12 11 7"></polyline>
                    <polyline points="18 17 13 12 18 7"></polyline>
                </svg>
            </div>
            @if($paginator->currentPage() > 2)
                {{-- Previous Page Link --}}
                <div wire:click="previousPage" wire:key="chevronLeft" class="h-8 md:h-12 w-8 md:w-12  flex justify-center items-center rounded-full bg-indigo-500 hover:bg-indigo-800 cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left w-3 md:w-6 h-3 md:h-6">
                        <polyline points="15 18 9 12 15 6"></polyline>
                    </svg>
                </div>
            @endif
        @endif

        <!-- Pagination Elements -->
        @foreach ($elements as $element)
            <!-- Array Of Links -->
            @if (is_array($element))
                <div class="flex h-8 md:h-12 font-medium rounded-full bg-indigo-500">
                    @foreach ($element as $page => $url)
                    
                        <!--  Use three dots when current page is greater than 3.  -->
                        @if ($paginator->currentPage() > 3 && $page === 2)
                            <div wire:key="leftDots" class="w-8 md:w-12 flex justify-center items-center leading-5 transition duration-150 ease-in text-white rounded-full">...</div>
                        @endif

                        <!--  Show active page two pages before and after it.  -->
                        @if ($page === $paginator->currentPage())
                            <div wire:key="{{ $page }}" class="w-8 md:w-12 flex justify-center items-center cursor-pointer leading-5 transition duration-150 ease-in rounded-full bg-indigo-800 text-white">
                                {{ $page }}
                            </div>
                        @elseif ($page === $paginator->currentPage() + 1 || $page === $paginator->currentPage() + 2 || $page === $paginator->currentPage() - 1 || $page === $paginator->currentPage() - 2)
                            <div wire:click="gotoPage({{ $page }})" wire:key="{{ $page }}" class="w-8 md:w-12 flex justify-center items-center cursor-pointer leading-5 transition duration-150 ease-in bg-indigo-500 hover:bg-indigo-800 text-white rounded-full">
                                {{ $page }}
                            </div>
                        @endif

                        <!--  Use three dots when current page is away from end.  -->
                        @if ($paginator->currentPage() < $paginator->lastPage() - 2  && $page === $paginator->lastPage() - 1)
                            <div wire:key="rightDots" class="w-8 md:w-12 flex justify-center items-center leading-5 transition duration-150 ease-in text-white rounded-full">...</div>
                        @endif
                        
                    @endforeach
                </div>
            @endif
        @endforeach
        
        
        @if ($paginator->hasMorePages())
            {{-- Next Page Link --}}
            @if($paginator->lastPage() - $paginator->currentPage() >= 2)
                <div wire:click="nextPage" wire:key="chevronRight" class="h-8 md:h-12 w-8 md:w-12  flex justify-center items-center rounded-full bg-indigo-500 hover:bg-indigo-800 cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right w-3 md:w-6 h-3 md:h-6">
                        <polyline points="9 18 15 12 9 6"></polyline>
                    </svg>
                </div>
            @endif
                {{-- Last Page Link --}}
                <div wire:click="gotoPage({{ $paginator->lastPage() }})" wire:key="chevronsRight" class="h-8 md:h-12 w-8 md:w-12  flex justify-center items-center rounded-full bg-indigo-500 hover:bg-indigo-800 cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevrons-right w-3 md:w-6 h-3 md:h-6">
                        <polyline points="13 17 18 12 13 7"></polyline>
                        <polyline points="6 17 11 12 6 7"></polyline>
                    </svg>
                </div>
        @endif
        
    @endif
</div>