@props(['ad'])

<div class="wrn modal" id="warn-modal-{{ $ad->id }}" tabindex="-1" role="dialog"
    aria-labelledby="warn-modal-{{ $ad->id }}" aria-hidden="true">
    <div class="revcard modal-dialog" role="document">
        <div class="modal-content warn-modal">
            <div class="justify-content-end pt-3 pr-3">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @foreach ($ad->images as $image)

                    <div class="py-3">
                        @if ($image->labels)
                            <div class="d-flex flex-column flex-md-row justify-content-between align-items-start mb-3">
                                <img src="{{ $image->getUrl(200, 150) }}"
                                    class="swiper-slide d-block card-img-top mr-3 wobile mb-3" alt="{{ $ad->title }}">
                                <div class="tags w-100">
                                    <div class="d-flex flex-row justify-content-between align-items-center redpr">
                                        <label for="adult"
                                            class="mb-0 font-weight-bold">{{ __('revisor.adult') }}</label>
                                        <progress id="adult" value="{{ $image->adult }}" max="6"
                                            class="align-self-end my-auto">
                                            {{ $image->adult / 0.6 }} </progress>
                                    </div>
                                    <div class="d-flex flex-row justify-content-between align-items-center redpr">
                                        <label for="spoof"
                                            class="mb-0 font-weight-bold">{{ __('revisor.spoof') }}</label>
                                        <progress id="spoof" value="{{ $image->spoof }}" max="6"
                                            class="align-self-end my-auto ">
                                            {{ $image->spoof / 0.6 }}</progress>
                                    </div>
                                    <div class="d-flex flex-row justify-content-between align-items-center redpr">
                                        <label for="medical"
                                            class="mb-0 font-weight-bold">{{ __('revisor.medical') }}</label>
                                        <progress id="medical" value="{{ $image->medical }}" max="6"
                                            class="align-self-end my-auto">
                                            {{ $image->medical / 0.6 }} </progress>
                                    </div>
                                    <div class="d-flex flex-row justify-content-between align-items-center redpr">
                                        <label for="violence"
                                            class="mb-0 font-weight-bold">{{ __('revisor.violence') }}</label>
                                        <progress id="violence" value="{{ $image->violence }}" max="6"
                                            class="align-self-end my-auto">
                                            {{ $image->violence / 0.6 }}</progress>
                                    </div>
                                    <div class="d-flex flex-row justify-content-between align-items-center redpr">
                                        <label for="racy" class="mb-0 font-weight-bold">{{ __('revisor.racy') }}</label>
                                        <progress id="racy" value="{{ $image->racy }}" max="6"
                                            class="align-self-end my-auto">{{ $image->racy / 0.6 }}
                                        </progress>
                                    </div>

                                </div>

                            </div>
                            @foreach ($image->labels as $label)
                                <span class="badge badge-pill badge-secondary">{{ $label }}</span>


                            @endforeach
                        @endif
                    </div>

                @endforeach
            </div>
        </div>
    </div>
</div>
