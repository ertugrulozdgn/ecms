@extends('cms.layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="portlet light bordered form-fit">
                <div class="portlet-title tabbable-line">
                    <div class="caption">
                        <i class="icon-plus"></i>
                        <span class="caption-subject font-dark">
                            @lang('cms/pages/post/news.'. ($edit > 0 ? 'edit' : 'create') .'.title')
                        </span>
                    </div>
                    <div class="actions">
                        <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="#"></a>
                    </div>
                </div>
                <div class="portlet-body form">
                    {{
                        Form::open([
                            'class' => 'form-horizontal form-row-seperated',
                            'rol' => 'form',
                            'id' => 'news_form',
                            'url' => $edit > 0 && $agency == 0 ? action('Cms\Post\NewsController@update', [$post->id]) : action('Cms\Post\NewsController@store'),
                            'files' => true,
                            'method' => $edit > 0 && $agency == 0 ? 'put' : 'post',
                            'onsubmit' => "return sendForm.init(this, '". $form_referrer ."')"
                        ])
                    }}
                    <div class="form-status"></div>
                    <div class="form-body">
                        <div class="form-group">
                            {{ 
                                Form::bsLabel('breaking', trans('cms/pages/post/post.edit.forms.breaking.label'), [
                                    'class' => 'col-md-2 control-label'
                                ])
                            }}
                            <div class="col-md-10">
                                {{
                                    Form::select(
                                        'breaking', 
                                        (['' => trans('cms/pages/post/post.edit.forms.breaking.select_default')] + cons('breaking.types')->toArray()), 
                                        $edit > 0 && !empty($breaking) ? $breaking->type : '', 
                                        [
                                            'class' => 'bs-select form-control'
                                        ]
                                    )
                                }}
                                <span class="help-block">
                                    @lang('cms/pages/post/post.edit.forms.breaking.help_block')
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            {{ 
                                Form::bsLabel('location', trans('cms/pages/post/post.edit.forms.locations.location'), [
                                    'class' => 'col-md-2 control-label'
                                ], true)
                            }}
                            <div class="col-md-10">
                                <div class="icheck-inline">
                                    @foreach($locations as $key => $location)
                                        {{
                                            Form::iradio('location', $location, $key,
                                                $edit > 0 ? $post->location == $key ? true : false : $key == 1 ? true : false, [
                                                    'id' => 'location_'.$key,
                                                    'class' => 'icheck',
                                                    'data-radio' => 'iradio_square'
                                                ])
                                        }}
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            {{ 
                                Form::bsLabel('published_at', trans('cms/pages/post/post.edit.forms.published_at'), [
                                    'class' => 'col-md-2 control-label'
                                ], true)
                            }}
                            <div class="col-md-10">
                                {{
                                    Form::text('published_at', 
                                        $edit > 0 ? $post->published_at->format('d-m-Y H:i') : (new Date())->format('d-m-Y H:i'), [
                                        'id' => 'published_at',
                                        'class' => 'form-control mask_datetime'
                                    ])
                                }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{
                                Form::bsLabel('spot_title', trans('cms/pages/post/post.edit.forms.spot_title'), [
                                    'class' => 'col-md-2 control-label'
                                ], false)
                            }}
                            <div class="col-md-10">
                                {{
                                    Form::text('spot_title', $edit > 0 ? $post->spot_title : '', [
                                        'id' => 'spot_title',
                                        'class' => 'form-control maxlength',
                                        'maxlength' => 30
                                    ])
                                }}
                                <span class="help-block">Manşet sarı başlık</span>
                            </div>
                        </div>
                        <div class="form-group">
                            {{
                                Form::bsLabel('short_title', trans('cms/pages/post/post.edit.forms.short_title'), [
                                    'class' => 'col-md-2 control-label'
                                ], true)
                            }}
                            <div class="col-md-10">
                                {{
                                    Form::text('short_title', $edit > 0 ? $post->short_title : '', [
                                        'id' => 'short_title',
                                        'class' => 'form-control maxlength',
                                        'maxlength' => 50
                                    ])
                                }}
                                <span class="help-block">Bütün listelerde görünecek başlık</span>
                            </div>
                        </div>
                        <div class="form-group">
                            {{
                                Form::bsLabel('title', trans('cms/pages/post/post.edit.forms.title'), [
                                    'class' => 'col-md-2 control-label'
                                ])
                            }}
                            <div class="col-md-10">
                                {{
                                    Form::text('title', $edit > 0 ? $post->title : '', [
                                        'id' => 'title',
                                        'class' => 'form-control maxlength',
                                        'maxlength' => 120
                                    ])
                                }}
                                <span class="help-block">Detay sayfada görünecek başlık(Boş bırakılırsa kısa başlık eklenecektir).</span>
                            </div>
                        </div>
                        <div class="form-group">
                            {{
                                Form::bsLabel('seo_title', trans('cms/pages/post/post.edit.forms.seo_title'), [
                                    'class' => 'col-md-2 control-label'
                                ])
                            }}
                            <div class="col-md-10">
                                {{
                                    Form::text('seo_title', $edit > 0 ? $post->seo_title : '', [
                                        'id' => 'seo_title',
                                        'class' => 'form-control maxlength',
                                        'maxlength' => 160
                                    ])
                                }}
                                <span class="help-block">Detay sayfalarda meta olarak görünecek başlık(Boş bırakılırsa başlık(başlık da boş ise kısa başlık) eklenecektir).</span>
                            </div>
                        </div>
                        <div class="form-group">
                            {{ 
                                Form::bsLabel('summary', trans('cms/pages/post/post.edit.forms.summary'), [
                                    'class' => 'col-md-2 control-label'
                                ], true)
                            }}
                            <div class="col-md-10">
                                {{
                                    Form::textarea('summary', $edit > 0 ? $post->summary : '', [
                                        'id' => 'summary',
                                        'class' => 'form-control maxlength',
                                        'maxlength' => 300,
                                        'rows' => 3
                                    ])
                                }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ 
                                Form::bsLabel('content', trans('cms/pages/post/post.edit.forms.content'), [
                                    'class' => 'col-md-2 control-label'
                                ], true)
                            }}
                            <div class="col-md-10">
                                {{
                                    Form::textarea('content', $agency == 1 ? $agency_post->attributes->body : ($edit > 0 ? $post->content->text : ''), [
                                        'id' => 'content',
                                        'class' => 'form-control mceEditor'
                                    ])
                                }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ 
                                Form::bsLabel('categories', trans('cms/pages/post/post.edit.forms.category'), [
                                    'class' => 'col-md-2 control-label'
                                ], true)
                            }}
                            <div class="col-md-10">
                                {!! $categories !!}
                                <div class="form-control-focus"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            {{ 
                                Form::bsLabel('tags', trans('cms/pages/post/post.edit.forms.tag'), [
                                    'class' => 'col-md-2 control-label'
                                ], true)
                            }}
                            <div class="col-md-10">
                                {{ 
                                    Form::text('tags', $edit > 0 ? $post->tags_string : '', [
                                        'class' => 'form-control tags',
                                        'data-url' => action('Cms\Post\PostController@tags')
                                    ]) 
                                }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ 
                                Form::bsLabel('embed_code', trans('cms/pages/post/news.edit.forms.embed_code.embed_code'), [
                                    'class' => 'col-md-2 control-label'
                                ]) 
                            }}
                            <div class="col-md-10">
                                {{
                                    Form::textarea('embed_code', $edit > 0 ? $post->video_embed : '', [
                                        'id' => 'embed_code',
                                        'class' => 'form-control mb-10',
                                        'rows' => 4
                                    ])
                                }}
                                <div>
                                    <a href="{{ action('Cms\Tools\VideoController@popup') }}" data-target="#ajaxModal"
                                       data-toggle="modal" class="btn btn-sm btn-outline btn-circle blue">
                                        <i class="fa fa-play"></i>
                                        @lang('cms/pages/post/news.edit.forms.embed_code.add_video_archive')
                                    </a>
                                    <a href="{{ action('Cms\Tools\YoutubeController@popup') }}" data-target="#ajaxModal"
                                       data-toggle="modal" class="btn btn-sm btn-outline btn-circle red">
                                        <i class="fa fa-youtube-play"></i>
                                        @lang('cms/pages/post/news.edit.forms.embed_code.add_youtube')
                                    </a>
                                </div>
                                <span class="help-block">@lang('cms/pages/post/news.edit.forms.embed_code.help_description')</span>
                            </div>
                        </div>
                        @widget('Cms\Slim', [
                            'label' => trans('cms/pages/post/post.edit.forms.image.post_cover'),
                            'config_key' => 'post_cover',
                            'image' => $edit > 0 ? $post->image(['type' => 'post_cover']) : false,
                            'col' => 'col-md-4 col-lg-3', 'archive' => true
                        ])
                        @if($agency == 1 && !empty($agency_post->attributes->images))
                            <script>
                                function slimInitialised(data) {
                                    $('.slim').slim('load', '{{ config('agency.image_url') . '/2/1280/720' . $agency_post->attributes->images[0] }}');
                                }
                            </script>
                        @endif
                        <div class="form-group">
                            {{ 
                                Form::bsLabel('redirect', trans('cms/pages/post/news.edit.forms.redirect.redirect'), [
                                    'class' => 'col-md-2 control-label'
                                ]) 
                            }}
                            <div class="col-md-10">
                                {{
                                    Form::text('redirect_link', $edit > 0 ? $post->redirect_link : '', [
                                        'id' => 'redirect_link',
                                        'class' => 'form-control'
                                    ])
                                }}
                                <span class="help-block">
                                    @lang('cms/pages/post/news.edit.forms.redirect.help_description')
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            {{ 
                                Form::bsLabel('show_on_last_news_bar', 
                                    trans('cms/pages/post/post.edit.forms.show_on_last_news_bar.show_on_last_news_bar'), [
                                    'class' => 'col-md-2 control-label'
                                ]) 
                            }}
                            <div class="col-md-10">
                                {{
                                    Form::checkbox('show_on_last_news_bar', 1, $edit == 0 || ($edit > 0 && $post->show_on_last_news_bar == 1) ? true : false, [
                                        'id' => 'show_on_last_news_bar',
                                        'class' => 'make-switch',
                                        'data-on-color' => 'primary',
                                        'data-off-color' => 'danger',
                                        'data-size' => 'small',
                                        'data-on-text' => trans('cms/pages/post/post.edit.forms.show_on_last_news_bar.active'),
                                        'data-off-text' => trans('cms/pages/post/post.edit.forms.show_on_last_news_bar.passive')
                                    ])
                                }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ 
                                Form::bsLabel('is_seo_news', 
                                    trans('cms/pages/post/post.edit.forms.is_seo_news.is_seo_news'), [
                                    'class' => 'col-md-2 control-label'
                                ]) 
                            }}
                            <div class="col-md-10">
                                {{
                                    Form::checkbox('is_seo_news', 1, $edit == 0 || ($edit > 0 && $post->is_seo_news == 0) ? false : true, [
                                        'id' => 'is_seo_news',
                                        'class' => 'make-switch',
                                        'data-on-color' => 'primary',
                                        'data-off-color' => 'danger',
                                        'data-size' => 'small',
                                        'data-on-text' => trans('cms/pages/post/post.edit.forms.is_seo_news.active'),
                                        'data-off-text' => trans('cms/pages/post/post.edit.forms.is_seo_news.passive')
                                    ])
                                }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ 
                                Form::bsLabel('show_on_mainpage', 
                                    trans('cms/pages/post/post.edit.forms.show_on_mainpage.show_on_mainpage'), [
                                    'class' => 'col-md-2 control-label'
                                ]) 
                            }}
                            <div class="col-md-10">
                                {{
                                    Form::checkbox('show_on_mainpage', 1, $edit == 0 ||
                                        ($edit > 0 && $post->show_on_mainpage == 1) ? true : false, [
                                        'id' => 'show_on_mainpage',
                                        'class' => 'make-switch',
                                        'data-on-color' => 'primary',
                                        'data-off-color' => 'danger',
                                        'data-size' => 'small',
                                        'data-on-text' => trans('cms/pages/post/post.edit.forms.show_on_mainpage.active'),
                                        'data-off-text' => trans('cms/pages/post/post.edit.forms.show_on_mainpage.passive')
                                    ])
                                }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ 
                                Form::bsLabel('commentable',
                                    trans('cms/pages/post/post.edit.forms.commentable.commentable'), [
                                    'class' => 'col-md-2 control-label'
                                ]) 
                            }}
                            <div class="col-md-10">
                                {{
                                    Form::checkbox('commentable', 1, $edit == 0 ||
                                        ($edit > 0 && $post->commentable == 1) ? true : false, [
                                        'id' => 'commentable',
                                        'class' => 'make-switch',
                                        'data-on-color' => 'primary',
                                        'data-off-color' => 'danger',
                                        'data-size' => 'small',
                                        'data-on-text' => trans('cms/pages/post/post.edit.forms.commentable.active'),
                                        'data-off-text' => trans('cms/pages/post/post.edit.forms.commentable.passive')
                                    ])
                                }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ 
                                Form::bsLabel('show_ads', 
                                    trans('cms/pages/post/post.edit.forms.show_ads.show_ads'), [
                                    'class' => 'col-md-2 control-label'
                                ]) 
                            }}
                            <div class="col-md-10">
                                {{
                                    Form::checkbox('show_ads', 1, $edit == 0 ||
                                        ($edit > 0 && $post->show_ads == 1) ? true : false, [
                                        'id' => 'show_ads',
                                        'class' => 'make-switch',
                                        'data-on-color' => 'primary',
                                        'data-off-color' => 'danger',
                                        'data-size' => 'small',
                                        'data-on-text' => trans('cms/pages/post/post.edit.forms.show_ads.active'),
                                        'data-off-text' => trans('cms/pages/post/post.edit.forms.show_ads.passive')
                                    ])
                                }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ 
                                Form::label('status', trans('cms/pages/post/post.edit.forms.status.status'), [
                                    'class' => 'col-md-2 control-label'
                                ]) 
                            }}
                            <div class="col-md-10">
                                <div class="icheck-inline">
                                    {{
                                        Form::iradio('status', trans('cms/pages/post/post.edit.forms.status.active'), 1,
                                            $edit > 0 ? $post->status == 1 ? true : false : true, [
                                                'id' => 'status_1',
                                                'class' => 'icheck',
                                                'data-radio' => 'iradio_square-green'
                                            ])
                                    }}

                                    {{
                                        Form::iradio('status', trans('cms/pages/post/post.edit.forms.status.passive'), 0,
                                            $edit > 0 ? $post->status == 0 ? true : false : false, [
                                                'id' => 'status_0',
                                                'class' => 'icheck',
                                                'data-radio' => 'iradio_square-red'
                                            ])
                                    }}

                                    {{
                                        Form::iradio('status', trans('cms/pages/post/post.edit.forms.status.timed'), 2,
                                            $edit > 0 ? $post->status == 2 ? true : false : false, [
                                                'id' => 'status_2',
                                                'class' => 'icheck',
                                                'data-radio' => 'iradio_square-grey'
                                            ])
                                    }}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            {{
                                Form::bsLabel('notification', trans('cms/pages/post/post.edit.forms.sent_notification'), [
                                    'class' => 'col-md-2 control-label'
                                ])
                            }}
                            <div class="col-md-10">
                                <div class="icheck-inline">
                                    @foreach($notification_types as $key => $value)
                                        {{
                                            Form::icheckbox('notification['. $key .']', $value, $key, false, [
                                                    'id' => 'notification['. $key .']_'. $key,
                                                    'class' => 'icheck',
                                                    'data-checkbox' => 'icheckbox_square'
                                                ])
                                        }}
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            {{
                                Form::bsLabel('notification_spot_title', 'Bildirim Üst Başlığı', [
                                    'class' => 'col-md-2 control-label'
                                ], false)
                            }}
                            <div class="col-md-10">
                                {{
                                    Form::text('notification_spot_title', '', [
                                        'id' => 'notification_spot_title',
                                        'class' => 'form-control maxlength',
                                        'maxlength' => 30
                                    ])
                                }}
                                <span class="help-block">Boş bırakılırsa 'Son Dakika' yazısı ile gönderilir.</span>
                            </div>
                        </div>
                        <div class="form-group">
                            {{
                                Form::bsLabel('notification_title', 'Bildirim Başlığı', [
                                    'class' => 'col-md-2 control-label'
                                ], false)
                            }}
                            <div class="col-md-10">
                                {{
                                    Form::text('notification_title', '', [
                                        'id' => 'notification_title',
                                        'class' => 'form-control maxlength',
                                        'maxlength' => 50
                                    ])
                                }}
                                <span class="help-block">Boş bırakılırsa haber başlığı ile gönderilir.</span>
                            </div>
                        </div>
                        @if($agency == 1)
                            <input type="hidden" name="agency_name" value="{{ $agency_post->attributes->agency }}" />
                            <input type="hidden" name="agency_id" value="{{ $agency_post->id }}" />
                            <input type="hidden" name="agency_code" value="{{ $agency_post->attributes->code }}" />
                        @endif
                        <div class="form-actions fluid">
                            <div class="row">
                                <div class="col-md-offset-2 col-md-10">
                                    {{
                                        Form::laddaSubmit(trans('cms/forms.save'), [
                                            'class' => 'btn btn-circle btn-outline blue mt-ladda-btn ladda-button mt-progress-demo',
                                            'data-style' => 'expand-left'
                                        ])
                                    }}
                                    &nbsp;
                                    <button type="button" data-action="continue" onclick="sendForm.continue(this);" class="btn btn-circle btn-outline blue mt-ladda-btn ladda-button mt-progress-demo" data-style="expand-left">
                                        <span class="ladda-label">Kaydet ve Devam et</span>
                                    </button>
                                    &nbsp;
                                    <a href="{{ action('Cms\Post\NewsController@index') }}" class="btn btn-circle btn-outline red">
                                        @lang('cms/forms.cancel')
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@endsection
