<div class="px-3 py-4">
    @if($getState())
        <span class="text-sm">{{ $getState() }}</span>
    @else
        <span class="text-sm">{{ __('admin-kit-infographics::infographics.empty') }}.</span>
    @endif
</div>
