$('.forum_comments_block').load(document.URL + ' .forum_comments_block');
    var text = document.getElementById('comment');
    $(document).on("click", "#code", function() {
        code();
    });

    function code() {
        if (text.selectionStart != undefined) {
            var startPos = text.selectionStart;
            var endPos = text.selectionEnd;
            var selectedText = text.value.substring(startPos, endPos)
            console.log(selectedText)
        }
        if (selectedText) {
            var v = text.value.substring(0, startPos);
            v += "<xmp>" + selectedText + "</xmp>";
            v += text.value.substring(endPos);
            text.value = v;
        }
    }
    $(function() {
        $('#comment').keyup(function(e) {
            if (e.keyCode == 13) {
                var curr = getCaret(this);
                var val = $(this).val();
                var end = val.length;
                $(this).val(val.substr(0, curr) + '<br>' + val.substr(curr, end));
            }
        })
    });

    function getCaret(el) {
        if (el.selectionStart) {
            return el.selectionStart;
        } else if (document.selection) {
            el.focus();
            var r = document.selection.createRange();
            if (r == null) {
                return 0;
            }
            var re = el.createTextRange(),
                rc = re.duplicate();
            re.moveToBookmark(r.getBookmark());
            rc.setEndPoint('EndToStart', re);
            return rc.text.length;
        }
        return 0;
    }