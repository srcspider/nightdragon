#!/usr/bin/env ruby

if ($silent == false || $silent == nil)
	puts
end

require 'rubygems'
require 'json'
require 'fileutils'

$basedir = File.expand_path(File.dirname(__FILE__) + '/..')
Dir.chdir $basedir

json_config = `php -r "chdir('#{$basedir}'); echo json_encode(include '+style.php');"`;
$config = JSON.parse json_config

# cleanup config
$config['root'].gsub! /[\/\\]$/, ''
$config['sources'].gsub! /[\/\\]$/, ''

$rootdir = $basedir+'/'+$config['root'];

# remove all non .gitignore files to allow for clean start
def purge(directory)
	Dir["#{directory}/*"].each do |file|
		next if file == '.' || file == '..'
		if File.directory? file
			if ($silent == false || $silent == nil)
#				puts "  purging  #{File.expand_path(file).gsub($basedir, '')}"
			end#if
			purge(File.expand_path(file))
			if (Dir.entries(file) - %w[ . .. ]).empty?
				if ($silent == false || $silent == nil)
#					puts " cleaning  #{file.gsub($basedir, '')}"
				end#if
				Dir.rmdir file
			end#if
		elsif file !~ /^\..*$/ # ignore dot files
			if ($silent == false || $silent == nil)
#				puts " removing  #{file.gsub($basedir, '')}"
			end#if
			FileUtils.rm_rf file, :noop => false, :verbose => false
		end#if
	end#each
end#def

purge($rootdir)

# copy all non .scss files to the root; compass only copies images/
$srcdir = $basedir+'/'+$config['sources'];

Dir["#{$srcdir}/**/*"].each do |file|
	if (file.to_s.gsub($srcdir.to_s, '') !~ /\/(jquery|test|tests|docs|js|javascript|less|demos|examples|demo|example)(\/|$)/)
		if file !~ /^\..*$/ && file !~ /^.*\.(scss|sass|json|md)$/
			rootfile = $rootdir + (file.gsub $srcdir, '')
			# check if file is non-empty directory
			if File.directory?(file) && ! (Dir.entries(file) - %w[ . .. ]).empty?
				if ($silent == false || $silent == nil)
					puts "   moving  #{file.gsub($basedir, '')} => #{rootfile.gsub($basedir, '')}"
				end#if
				if ! File.exist? rootfile
					begin
						# FileUtils.cp_r(file, rootfile)
						FileUtils.mkdir(rootfile)
					rescue
						puts "    failed to copy directory!"
					end#rescue
				end
			elsif ! File.directory?(file)
				if ($silent == false || $silent == nil)
					puts "   moving  #{file.gsub($basedir, '')} => #{rootfile.gsub($basedir, '')}"
				end#if
				begin
					FileUtils.cp(file, rootfile)
				rescue
					puts "    failed to copy file!"
				end#rescue
			end#if
		end#if
	end#if
end#each

if ($silent == false || $silent == nil)
	puts
end
