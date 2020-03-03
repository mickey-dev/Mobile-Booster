import './tinymce/helper';
import faq from './tinymce/faq';
import job from './tinymce/job';
import multiFaq from './tinymce/multiFaq';
import event from './tinymce/event';
import person from './tinymce/person';
import course from './tinymce/course';

(function () {
    if (typeof tinymce !== 'undefined') {
        tinymce.PluginManager.add('structured_content_dropdown', function (
            editor
        ) {
            editor.addButton('structured_content_dropdown', {
                icon: 'structured-content',
                type: 'menubutton',
                menu: [
                    faq(editor),
                    multiFaq(editor),
                    job(editor),
                    event(editor),
                    person(editor),
                    course(editor)
                ],
            });
        });
    }
})();

