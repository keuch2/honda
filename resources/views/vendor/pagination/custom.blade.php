@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" style="margin-top: 40px;">
        <ul style="display: flex; justify-content: center; align-items: center; list-style: none; padding: 0; margin: 0; gap: 8px;">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li style="opacity: 0.5; cursor: not-allowed;">
                    <span style="display: inline-block; padding: 10px 16px; background: #f0f0f0; color: #999; border-radius: 4px; font-size: 14px; font-weight: 600;">
                        « Anterior
                    </span>
                </li>
            @else
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev" style="display: inline-block; padding: 10px 16px; background: #fff; color: #333; border: 1px solid #ddd; border-radius: 4px; text-decoration: none; font-size: 14px; font-weight: 600; transition: all 0.3s ease;">
                        « Anterior
                    </a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li style="padding: 0 8px; color: #999;">{{ $element }}</li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li>
                                <span style="display: inline-block; padding: 10px 16px; background: #cc0000; color: white; border-radius: 4px; font-size: 14px; font-weight: 600; min-width: 44px; text-align: center;">
                                    {{ $page }}
                                </span>
                            </li>
                        @else
                            <li>
                                <a href="{{ $url }}" style="display: inline-block; padding: 10px 16px; background: #fff; color: #333; border: 1px solid #ddd; border-radius: 4px; text-decoration: none; font-size: 14px; font-weight: 600; min-width: 44px; text-align: center; transition: all 0.3s ease;">
                                    {{ $page }}
                                </a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next" style="display: inline-block; padding: 10px 16px; background: #fff; color: #333; border: 1px solid #ddd; border-radius: 4px; text-decoration: none; font-size: 14px; font-weight: 600; transition: all 0.3s ease;">
                        Siguiente »
                    </a>
                </li>
            @else
                <li style="opacity: 0.5; cursor: not-allowed;">
                    <span style="display: inline-block; padding: 10px 16px; background: #f0f0f0; color: #999; border-radius: 4px; font-size: 14px; font-weight: 600;">
                        Siguiente »
                    </span>
                </li>
            @endif
        </ul>
    </nav>

    <style>
        nav[aria-label="Pagination Navigation"] a:hover {
            background: #cc0000 !important;
            color: white !important;
            border-color: #cc0000 !important;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(204, 0, 0, 0.2);
        }
    </style>
@endif
