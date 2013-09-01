require 'rubygems'
require 'sass-globbing'
require 'json'
require 'fileutils'

# Required Mjolnir configuration

	# read configuration
	$mj_basedir = File.expand_path(File.dirname(__FILE__) + '/..')
	Dir.chdir $mj_basedir
	mj_json_config = `php -r "chdir('#{$mj_basedir}'); echo json_encode(include '+style.php');"`;
	$mj_config = JSON.parse mj_json_config
	mj_style_root = $mj_config['root'] == nil ? "root" : $mj_config['root'].gsub(/\/$/, '')
	mj_style_src = $mj_config['sources'] == nil ? "src" : $mj_config['sources'].gsub(/\/$/, '')

	# sass setup
	http_path = ""
	css_dir = mj_style_root
	images_dir = "#{mj_style_root}/images"
	relative_assets = true
	sass_dir = mj_style_src

# Output

	output_style = :compressed
	line_comments = false
