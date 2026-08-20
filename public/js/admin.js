// public/js/admin.js

document.addEventListener('DOMContentLoaded', function() {
    'use strict';

    // Sidebar toggle
    const sidebarToggle = document.getElementById('sidebarToggle');
    const sidebar = document.querySelector('.admin-sidebar');
    const mainContent = document.querySelector('.admin-main');
    const headerToggle = document.getElementById('headerToggle');

    // Check for saved state
    const isCollapsed = localStorage.getItem('sidebarCollapsed') === 'true';
    if (isCollapsed && window.innerWidth > 991.98) {
        sidebar.classList.add('collapsed');
        mainContent.classList.add('expanded');
    }

    // Desktop toggle
    if (sidebarToggle) {
        sidebarToggle.addEventListener('click', function() {
            const isMobile = window.innerWidth <= 991.98;
            
            if (isMobile) {
                sidebar.classList.toggle('mobile-open');
                document.querySelector('.sidebar-overlay')?.classList.toggle('active');
            } else {
                sidebar.classList.toggle('collapsed');
                mainContent.classList.toggle('expanded');
                localStorage.setItem('sidebarCollapsed', sidebar.classList.contains('collapsed'));
            }
        });
    }

    // Mobile header toggle
    if (headerToggle) {
        headerToggle.addEventListener('click', function() {
            sidebar.classList.toggle('mobile-open');
            document.querySelector('.sidebar-overlay')?.classList.toggle('active');
        });
    }

    // Close sidebar on overlay click
    document.addEventListener('click', function(e) {
        if (window.innerWidth <= 991.98) {
            const overlay = document.querySelector('.sidebar-overlay');
            if (overlay && overlay.classList.contains('active')) {
                if (!sidebar.contains(e.target) && !headerToggle?.contains(e.target)) {
                    sidebar.classList.remove('mobile-open');
                    overlay.classList.remove('active');
                }
            }
        }
    });

    // Auto-close alerts
    document.querySelectorAll('.alert').forEach(function(alert) {
        setTimeout(function() {
            const closeBtn = alert.querySelector('.btn-close');
            if (closeBtn) {
                closeBtn.click();
            }
        }, 5000);
    });

    // Image preview for file inputs
    document.querySelectorAll('input[type="file"][data-preview]').forEach(function(input) {
        input.addEventListener('change', function(e) {
            const previewId = this.dataset.preview;
            const preview = document.getElementById(previewId);
            if (preview && this.files && this.files[0]) {
                const reader = new FileReader();
                reader.onload = function(ev) {
                    preview.src = ev.target.result;
                    preview.style.display = 'block';
                };
                reader.readAsDataURL(this.files[0]);
            }
        });
    });

    // Confirm before delete
    document.querySelectorAll('[data-confirm]').forEach(function(element) {
        element.addEventListener('click', function(e) {
            if (!confirm(this.dataset.confirm || 'Are you sure you want to delete this item?')) {
                e.preventDefault();
            }
        });
    });

    // Select all checkbox
    document.querySelectorAll('.select-all').forEach(function(checkbox) {
        checkbox.addEventListener('change', function() {
            const name = this.dataset.name || 'selected[]';
            document.querySelectorAll(`input[name="${name}"]`).forEach(function(item) {
                item.checked = checkbox.checked;
            });
        });
    });
});

// Handle window resize for sidebar
window.addEventListener('resize', function() {
    const sidebar = document.querySelector('.admin-sidebar');
    const mainContent = document.querySelector('.admin-main');
    
    if (window.innerWidth > 991.98) {
        sidebar?.classList.remove('mobile-open');
        document.querySelector('.sidebar-overlay')?.classList.remove('active');
        
        const isCollapsed = localStorage.getItem('sidebarCollapsed') === 'true';
        if (isCollapsed) {
            sidebar?.classList.add('collapsed');
            mainContent?.classList.add('expanded');
        }
    } else {
        sidebar?.classList.remove('collapsed');
        mainContent?.classList.remove('expanded');
    }
});