$(document).ready(function() {
  $("#twitter-feed").tweet({
    join_text: "auto",
    username: "naturebridge",
    avatar_size: 24,
    count: 3,
    auto_join_text_default: "I said,", 
    auto_join_text_ed: "I",
    auto_join_text_ing: "I was",
    auto_join_text_reply: "I replied",
    auto_join_text_url: "I checked out",
    loading_text: "loading tweets..."
  });
});