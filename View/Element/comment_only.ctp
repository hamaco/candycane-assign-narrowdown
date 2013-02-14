<script type="text/javascript">
  (function() {
    var user_ids = {};
    $$('#main a[href^=/account]').each(function(el) {
      if (/account\/show\/(\d+)/.test(el.href)) {
        user_ids[RegExp.$1] = 1;
      }
    });

    var original_select   = $('IssueAssignedToId');
    var narrowdown_select = original_select.cloneNode(true);
    for (var i = narrowdown_select.length, option; i > 0; i--) {
      option = $(narrowdown_select[i-1]);
      if (!user_ids[option.value]) {
        option.remove();
      }
    }

    var checkbox_html = '<input id="candycane_assign_narrowdown_only_concerned" type="checkbox" value="" name="" />関係者のみ'
    new Insertion.After(original_select, checkbox_html);

    var CandyCaneAssignNarrodownToggle = function() {
      if ($('candycane_assign_narrowdown_only_concerned').checked) {
        original_select.replace(narrowdown_select);
      } else {
        narrowdown_select.replace(original_select);
      }
    }

    $('candycane_assign_narrowdown_only_concerned').observe('click', CandyCaneAssignNarrodownToggle);
  })();
</script>
