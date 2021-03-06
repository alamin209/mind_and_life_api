<!-- start page title -->
<div class="row" style="margin-top:0px; margin-bottom:3px;">
    <div class="col-12" style="margin-top:0px; margin-bottom:0px;">
        <div class="page-title-box d-flex align-items-center justify-content-between" style="padding-bottom:5px">
            <h4 class="page-title mb-0 font-size-18">{{$title}}</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    @if(isset($li_1))
                        <li class="breadcrumb-item">
                            <a href="javascript: void(0);">
                                {{ $li_1 }}
                            </a>
                        </li>
                    @endif
                    @if(isset($title_li))
                        <li class="breadcrumb-item active">{{$title_li}}</li>
                    @else
                        <li class="breadcrumb-item active">{{$title}}</li>
                    @endif
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->
