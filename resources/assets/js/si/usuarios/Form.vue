<template>
    <div>
        <!-- Page header mini -->
        <div class="content-group border-top-lg border-top-primary">
            <div class="page-header page-header-default page-header-xs" style="border-left: 1px solid #ddd; border-right: 1px solid #ddd;">
                <div class="page-header-content">
                    <div class="page-title">
                        <h5>
                            <i class="icon-arrow-left52 position-left"></i>
                            <span class="text-semibold">{{ title }}</span>
                        </h5>
                    </div>
                </div>
            </div>
        </div>

        <!-- Page container -->
        <div class="page-container">
            <div class="page-content">
                <div class="content-wrapper">
                    <div class="content">
                        <form action="#">
                            <div class="panel panel-flat">
                                <div class="panel-heading">
                                    <h5 class="panel-title">Basic layout</h5>
                                    <div class="heading-elements">
                                        <ul class="icons-list">
                                            <li><a data-action="collapse"></a></li>
                                            <li><a data-action="reload"></a></li>
                                            <li><a data-action="close"></a></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="panel-body">
                                    <div class="form-group">
                                        <label>Name:</label>
                                        <input type="text" class="form-control" placeholder="Eugene Kopyov">
                                    </div>

                                    <div class="form-group">
                                        <label>Password:</label>
                                        <input type="password" class="form-control" placeholder="Your strong password">
                                    </div>

                                    <div class="form-group">
                                        <label>Your state:</label>
                                        <select class="form-control">
                                            <optgroup label="Alaskan/Hawaiian Time Zone">
                                                <option value="AK">Alaska</option>
                                                <option value="HI">Hawaii</option>
                                            </optgroup>
                                            <optgroup label="Pacific Time Zone">
                                                <option value="CA">California</option>
                                                <option value="NV">Nevada</option>
                                                <option value="WA">Washington</option>
                                            </optgroup>
                                            <optgroup label="Mountain Time Zone">
                                                <option value="AZ">Arizona</option>
                                                <option value="CO">Colorado</option>
                                                <option value="WY">Wyoming</option>
                                            </optgroup>
                                            <optgroup label="Central Time Zone">
                                                <option value="AL">Alabama</option>
                                                <option value="AR">Arkansas</option>
                                                <option value="KY">Kentucky</option>
                                            </optgroup>
                                            <optgroup label="Eastern Time Zone">
                                                <option value="CT">Connecticut</option>
                                                <option value="DE">Delaware</option>
                                                <option value="FL">Florida</option>
                                            </optgroup>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label class="display-block">Gender:</label>

                                        <label class="radio-inline">
                                            <input type="radio" class="styled" name="gender" checked="checked">
                                            Male
                                        </label>

                                        <label class="radio-inline">
                                            <input type="radio" class="styled" name="gender">
                                            Female
                                        </label>
                                    </div>

                                    <div class="form-group">
                                        <label class="display-block">Your avatar:</label>
                                        <input type="file" class="file-styled">
                                        <span class="help-block">Accepted formats: gif, png, jpg. Max file size 2Mb</span>
                                    </div>

                                    <div class="form-group">
                                        <label>Tags:</label>
                                        <select multiple="multiple" data-placeholder="Enter tags" class="select-icons">
                                            <optgroup label="Services">
                                                <option value="wordpress2" data-icon="wordpress2">Wordpress</option>
                                                <option value="tumblr2" data-icon="tumblr2">Tumblr</option>
                                                <option value="stumbleupon" data-icon="stumbleupon">Stumble upon</option>
                                                <option value="pinterest2" data-icon="pinterest2">Pinterest</option>
                                                <option value="lastfm2" data-icon="lastfm2">Lastfm</option>
                                            </optgroup>
                                            <optgroup label="File types">
                                                <option value="pdf" data-icon="file-pdf">PDF</option>
                                                <option value="word" data-icon="file-word">Word</option>
                                                <option value="excel" data-icon="file-excel">Excel</option>
                                                <option value="openoffice" data-icon="file-openoffice">Open office</option>
                                            </optgroup>
                                            <optgroup label="Browsers">
                                                <option value="chrome" data-icon="chrome" selected="selected">Chrome</option>
                                                <option value="firefox" data-icon="firefox" selected="selected">Firefox</option>
                                                <option value="safari" data-icon="safari">Safari</option>
                                                <option value="opera" data-icon="opera">Opera</option>
                                                <option value="IE" data-icon="IE">IE</option>
                                            </optgroup>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Your message:</label>
                                        <textarea rows="5" cols="5" class="form-control" placeholder="Enter your message here"></textarea>
                                    </div>

                                    <div class="text-right">
                                        <button type="submit" class="btn btn-primary">Submit form <i class="icon-arrow-right14 position-right"></i></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
            $(".styled").uniform({ radioClass: 'choice' });
            $(".file-styled").uniform({
                fileButtonClass: 'action btn bg-pink-400'
            });
	export default {
        props: ['form'],
		data: function() {
			return { title : '' }
		},
		created: function() {
            if (this.form === 'create') this.title = 'Nuevo Usuario';
            else this.title = 'Actualizar Usuario';
        },
		updated: function() {
        }
	}
</script>
