YUI(M.yui.loader).use('node', function(Y) {
        var theme_send_mail = function() {
            var node = Y.one('.userprofile');
            if (node) {
                var html = '<div class="theme_mail_button">'
                        + '<form action="' + M.cfg.wwwroot + '/theme/ioc/mail.php" method="post">'
                        + '<input type="hidden" name="recipient" value="' + M.theme_mail.userid +'" />'
                        + '<input type="hidden" name="course" value="' + M.theme_mail.courseid +'" />'
                        + '<input type="hidden" name="sesskey" value="' + M.cfg.sesskey +'" />'
                        + '<input type="submit" value="' + M.util.get_string('sendmessage', 'theme_ioc') + '" />'
                        + '</form>'
                        + '</div>';
                var form = Y.Node.create(html);
                node.append(form);
            }
        };
    Y.on('domready', theme_send_mail);
});
