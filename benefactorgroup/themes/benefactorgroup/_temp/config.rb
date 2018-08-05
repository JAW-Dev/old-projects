# Require any additional compass plugins here.
require "susy";

# If you prefer the indented syntax, you might want to regenerate this
# project again passing --syntax sass, or you can uncomment this:
# preferred_syntax = :sass
preferred_syntax = :scss

# Basic Setup
http_path = "/"
css_dir = "css"
sass_dir = "sass"
fonts_dir = "fonts"
images_dir = "images"
javascripts_dir = "js"
fonts_dir = "fonts"

# You can select your preferred output style here (can be overridden via the command line)
output_style = :expanded
# output_style = :nested
# output_style = :compact
# output_style = :compressed

# Enviroment
environment = :development
# environment = :production

# To enable relative paths to assets via compass helper functions. Uncomment:
relative_assets = true

# To disable debugging comments that display the original location of your selectors. Uncomment:
# line_comments = true
line_comments = false

# If you prefer the indented syntax, you might want to regenerate this
# project again passing --syntax sass, or you can uncomment this:
# preferred_syntax = :sass
# and then run:
# sass-convert -R --from scss --to sass sass scss && rm -rf sass && mv scss sass

# Number of interger after the decimal
Sass::Script::Number.precision = 2

# Move the style.css file to the theme's root directory
require 'fileutils'
  on_stylesheet_saved do |file|
    if File.exists?(file) && File.basename(file) == "style.css"
    puts "Moving: #{file}"
    FileUtils.mv(file, File.dirname(file) + "/../" + File.basename(file))
  end
end

# Move the editor-style.css file to the theme's root directory
require 'fileutils'
  on_stylesheet_saved do |file|
    if File.exists?(file) && File.basename(file) == "editor-style.css"
    puts "Moving: #{file}"
    FileUtils.mv(file, File.dirname(file) + "/../" + File.basename(file))
  end
end
