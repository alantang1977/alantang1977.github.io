hexo.extend.filter.register('theme_inject', function(injects) {
    injects.header.file('default', 'source/_inject/test1.ejs', { key: 'value' }, { cache: true }, -1);
    injects.footer.raw('default', '<script async src="https://xxxxxx" crossorigin="anonymous"></script>');
  });