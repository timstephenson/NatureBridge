jQuery(document).ready(function() {
  jQuery("#twitter-feed").tweet({
    join_text: "auto",
    username: "NatureBridge",
    avatar_size: 48,
    count: 1,
    auto_join_text_default: "I said,", 
    auto_join_text_ed: "I",
    auto_join_text_ing: "I was",
    auto_join_text_reply: "I replied",
    auto_join_text_url: "I checked out",
    loading_text: "loading tweets..."
  });
});