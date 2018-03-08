

gulp.task('travis',['build', 'testServerJS'],function(){
	process.exit(0);
});


gulp.task('reload', function(){
	livereload.reload();
});
