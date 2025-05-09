<script>
        document.addEventListener('DOMContentLoaded', function () {
            console.log('Sistem komentar blog dimuat');

            function setupReplyToggles() {
                document.querySelectorAll('.reply-toggle').forEach(btn => {
                    const newBtn = btn.cloneNode(true);
                    btn.parentNode.replaceChild(newBtn, btn);
                });

                document.querySelectorAll('.reply-toggle').forEach(button => {
                    button.addEventListener('click', function (e) {
                        e.preventDefault();
                        const commentId = this.getAttribute('data-comment-id');

                        if (commentId) {
                            const replyForm = document.getElementById(`reply-form-${commentId}`);
                            if (replyForm) {
                                replyForm.classList.toggle('hidden');
                                return;
                            }
                        }

                        const commentContainer = this.closest('.comment-container');
                        if (commentContainer) {
                            const replyForm = commentContainer.querySelector('.reply-form');
                            if (replyForm) {
                                replyForm.classList.toggle('hidden');
                            }
                        }
                    });
                });

                document.querySelectorAll('.cancel-reply').forEach(button => {
                    button.addEventListener('click', function (e) {
                        e.preventDefault();
                        const replyForm = this.closest('.reply-form');
                        if (replyForm) {
                            replyForm.classList.add('hidden');
                        }
                    });
                });
            }

            function setupCommentForms() {
                document.querySelectorAll('form.comment-form').forEach(form => {
                    form.addEventListener('submit', function (e) {
                        if (!this.action) return;

                        e.preventDefault();
                        const formData = new FormData(this);
                        const submitButton = this.querySelector('button[type="submit"]');
                        const originalText = submitButton.textContent;

                        submitButton.disabled = true;
                        submitButton.textContent = 'Posting...';

                        fetch(this.action, {
                            method: this.method || 'POST',
                            body: formData,
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || ''
                            }
                        })
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    window.location.reload();
                                } else {
                                    alert('Error posting comment: ' + (data.message || 'Unknown error'));
                                }
                            })
                            .catch(error => {
                                console.error('Error:', error);
                                alert('Error posting comment. Please try again.');
                            })
                            .finally(() => {
                                submitButton.disabled = false;
                                submitButton.textContent = originalText;
                            });
                    });
                });
            }

            function setupLoadMoreComments() {
                const loadMoreBtn = document.getElementById('load-more-comments');
                if (loadMoreBtn) {
                    loadMoreBtn.addEventListener('click', function () {
                        const commentsContainer = document.getElementById('comments-container');
                        const currentCount = commentsContainer.querySelectorAll('.comment-container').length;

                        let postId;
                        const postIdInput = document.querySelector('input[name="post_id"]');
                        if (postIdInput) {
                            postId = postIdInput.value;
                        } else {
                            const urlParams = new URLSearchParams(window.location.search);
                            postId = urlParams.get('post_id');
                        }

                        if (!postId) {
                            console.error('Post ID tidak ditemukan');
                            return;
                        }

                        this.disabled = true;
                        this.textContent = 'Loading...';

                        fetch(`/user/comments/load-more?post_id=${postId}&offset=${currentCount}`)
                            .then(response => response.json())
                            .then(data => {
                                if (data.success && data.html) {
                                    commentsContainer.insertAdjacentHTML('beforeend', data.html);

                                    setupReplyToggles();

                                    if (data.remaining <= 0) {
                                        this.style.display = 'none';
                                    }
                                }
                            })
                            .catch(error => {
                                console.error('Error loading more comments:', error);
                            })
                            .finally(() => {
                                this.disabled = false;
                                this.textContent = 'Load More Comments';
                            });
                    });
                }
            }

            function checkAndFixCommentStructure() {
                document.querySelectorAll('.comment-container').forEach((container, index) => {
                    const replyButton = container.querySelector('.reply-toggle');
                    if (replyButton && !replyButton.hasAttribute('data-comment-id')) {
                        const commentId = container.id ? container.id.replace('comment-', '') : `temp-${index}`;
                        replyButton.setAttribute('data-comment-id', commentId);
                    }

                    const replyForm = container.querySelector('.reply-form');
                    if (replyForm) {
                        const commentId = replyButton ? replyButton.getAttribute('data-comment-id') : `temp-${index}`;
                        replyForm.id = `reply-form-${commentId}`;

                        if (!replyForm.classList.contains('hidden')) {
                            replyForm.classList.add('hidden');
                        }
                    }
                });
            }

            checkAndFixCommentStructure();
            setupReplyToggles();
            setupCommentForms();
            setupLoadMoreComments();

            document.querySelectorAll('.reply-toggle').forEach(button => {
                button.addEventListener('click', function () {
                    this.style.backgroundColor = 'rgba(79, 70, 229, 0.1)';
                    setTimeout(() => {
                        this.style.backgroundColor = '';
                    }, 300);
                });
            });
        });
    </script>
