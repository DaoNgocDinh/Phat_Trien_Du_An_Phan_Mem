                <div class="flex items-center gap-6">

                    <a href="{{ $users->previousPageUrl() ?? '#' }}"
                        class="inline-flex h-9 w-9 items-center justify-center rounded-md border border-gray-200 text-gray-800 hover:bg-gray-50 transition {{ $users->onFirstPage() ? 'pointer-events-none opacity-40' : '' }}">
                        < </a>

                            <div
                                class="inline-flex h-9 w-9 items-center justify-center rounded-md border border-gray-200 font-semibold">
                                {{ $users->currentPage() }}
                            </div>

                            <a href="{{ $users->nextPageUrl() ?? '#' }}"
                                class="inline-flex h-9 w-9 items-center justify-center rounded-md border border-gray-200 text-gray-800 hover:bg-gray-50 transition {{ $users->hasMorePages() ? '' : 'pointer-events-none opacity-40' }}">
                                >
                            </a>

                </div>