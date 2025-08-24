const template = document.createElement('template');

template.innerHTML = `
<style>
@import url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css');

:root {

    --linkColor: rgba(9, 89, 9, .7);
    --navColor: hsl(0, 0%, 90%);
    --textColor: hsl(0, 0%, 25%);
    --muteColor: hsl(0, 0%, 95%);
    --bgColor: hsl(0, 0%, 22%);
    --accentColor: hsl(300, 50%, 50%);

}
.footer {
    background-color: var(--bgColor);
    color: var(--muteColor);
    width: 100%;

}

.footer ul {
    list-style: none;
    padding-left: 0;
}

.footer a {
    color: var(--navColor);
}

.footer a:hover {
    color: var(--accentColor);
}

.footer-main {
    display: flex;
    padding: 1rem 2rem;
    justify-content: space-between;
}
.footer-social {
    padding: 1rem 2rem;
}
.footer-social-list {
    display: flex;
    justify-content: center;
}


.footer-social-list a {
    margin: .5rem;
}

.footer-legal {
    padding: 1rem 2rem;
}


.footer-legal-list {
    display: flex;
    justify-content: space-evenly;
}

</style>
<footer class="footer">
        <section class="footer-main">
            <div class="footer-main-item">
                <h3 class="footer-title">About</h3>
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="blog.html">Blog</a></li>
                    <li><a href="about.html">About</a></li>
                    <li><a href="contact.html">Contact</a></li>
                </ul>
            </div>
            <div class="footer-main-item">
                <h3 class="footer-title">Contacts</h3>
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="blog.html">Blog</a></li>
                    <li><a href="about.html">About</a></li>
                    <li><a href="contact.html">Contact</a></li>
                </ul>
            </div>
            <div class="footer-main-item">
                <h3 class="footer-title">Resources</h3>
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="blog.html">Blog</a></li>
                    <li><a href="about.html">About</a></li>
                    <li><a href="contact.html">Contact</a></li>
                </ul>
            </div>

        </section>
        <section class="footer-social">
            <div class="footer-social-list">
                <a href="#" class="fa-brands fa-facebook"></a>
                <a href="#" class="fa-brands fa-twitter"></a>
                <a href="#" class="fa-brands fa-google"></a>
                <a href="#" class="fa-brands fa-facebook"></a>
                <a href="#" class="fa-brands fa-twitter"></a>
                <a href="#" class="fa-brands fa-google"></a>
            </div>
        </section>

        <section class="footer-legal">
            <ul class="footer-legal-list">
                <li>
                    <a href="#">Terms &amp; Conditions</a>
                </li>
                <li>
                    <a href="#">Privacy policy</a>
                </li>
                <li>
                    &copy; 2025 Copyright My company
                </li>
            </ul>

        </section>


    </footer>
`;

export default class Footer extends HTMLElement {

    constructor() {
        // Always call super first in constructor
        super(); 
    }

    connectedCallback() {
        const shadow = this.attachShadow({
            mode: 'closed'
        });
        shadow.appendChild(template.content);
    }
}