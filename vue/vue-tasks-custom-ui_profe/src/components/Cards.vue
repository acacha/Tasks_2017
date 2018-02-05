<template>
    <div>
        <div class="card1">
            <div class="card1-image">
                <img src="../assets/sample.jpg">
                <span class="card-title">Card Title</span>
            </div>
            <div class="card1-content">
                <p>I am a very simple card. I am good at containing small bits of information.
                    I am convenient because I require little markup to use effectively.</p>
            </div>
            <div class="card1-action">
                <a href="#">This is a link</a>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium amet debitis dolores ea quibusdam quo quos sunt ut voluptas voluptate. Dignissimos eum, ipsa maiores nisi quae sunt vero voluptate voluptatibus.</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab, accusantium beatae deserunt distinctio eius fugit modi nulla optio quas qui quidem quis reiciendis, sit? Aliquid facilis placeat repudiandae ullam voluptatem.</p>

            </div>
        </div>

        <br/>

        <div class="card stacked">
            <img src="../assets/card-top.jpg" alt="Sunset in the mountains">
            <div class="card-title">
                Title
            </div>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad commodi cumque dicta dignissimos dolore exercitationem repudiandae sunt suscipit! Earum nulla possimus sequi vel voluptate voluptatibus? Ipsam laudantium natus reiciendis voluptatibus.</p>
            <ul>
                <li>Action 1</li>
                <li>Action 2</li>
            </ul>
        </div>

        <!--https://unsplash.com/-->

        <div class="media">
            <div class="media-left">
                <img src="http://placehold.it/50x50">
            </div>

            <div class="media-content">
                <h4>John Doe</h4>

                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </p>
            </div>
        </div>

        <div class="media">
            <div class="media-left">
                <img src="http://lorempixel.com/50/50">
            </div>

            <div class="media-content">
                <h4>Title</h4>

                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </p>
            </div>
        </div>

        <div class="max-w-sm rounded overflow-hidden shadow-lg mt-4">
            <img class="w-full" src="../assets/card-top.jpg" alt="Sunset in the mountains">
            <div class="px-6 py-4">
                <div class="font-bold text-xl mb-2">The Coldest Sunset A</div>
                <p class="text-grey-darker text-base">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus quia, nulla! Maiores et perferendis eaque, exercitationem praesentium nihil.
                </p>
            </div>
            <div class="px-6 py-4">
                <span class="inline-block bg-grey-lighter rounded-full px-3 py-1 text-sm font-semibold text-grey-darker mr-2">#photography</span>
                <span class="inline-block bg-grey-lighter rounded-full px-3 py-1 text-sm font-semibold text-grey-darker mr-2">#travel</span>
                <span class="inline-block bg-grey-lighter rounded-full px-3 py-1 text-sm font-semibold text-grey-darker">#winter</span>
            </div>
        </div>

        <div class="max-w-md w-full lg:flex mt-4">
            <div class="h-48 lg:h-auto lg:w-48 flex-none bg-cover rounded-t lg:rounded-t-none lg:rounded-l text-center overflow-hidden" style="background-image: url('https://tailwindcss.com/img/card-left.jpg')" title="Woman holding a mug">
            </div>
            <div class="border-r border-b border-l border-grey-light lg:border-l-0 lg:border-t lg:border-grey-light bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
                <div class="mb-8">
                    <p class="text-sm text-grey-dark flex items-center">
                        <svg class="fill-current text-grey w-3 h-3 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M4 8V6a6 6 0 1 1 12 0v2h1a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-8c0-1.1.9-2 2-2h1zm5 6.73V17h2v-2.27a2 2 0 1 0-2 0zM7 6v2h6V6a3 3 0 0 0-6 0z" />
                        </svg>
                        Members only
                    </p>
                    <div class="text-black font-bold text-xl mb-2">Can coffee make you a better developer?</div>
                    <p class="text-grey-darker text-base">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus quia, nulla! Maiores et perferendis eaque, exercitationem praesentium nihil.</p>
                </div>
                <div class="flex items-center">
                    <img class="w-10 h-10 rounded-full mr-4" src="https://pbs.twimg.com/profile_images/885868801232961537/b1F6H4KC_400x400.jpg" alt="Avatar of Jonathan Reinink">
                    <div class="text-sm">
                        <p class="text-black leading-none">Jonathan Reinink</p>
                        <p class="text-grey-dark">Aug 18</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style>

    .media {
        display: flex;
        width: 100%;
        border: 1px solid black;
        border-radius: 0.5em;
    }

    .media-left {
        margin-right: 1em;
    }

    .media-content {
        flex: 1;
    }

    .media-content-buttons {
        text-align: right;
    }

    .media-content textarea {
        width: 100%;
        min-height: 100px;
        padding: 0;
        border-color: #cecece;
    }

    .card1 {
        border: 1px solid black;
    }

    .card1 .card1-image {
        border: 1px solid black;
        float: right;
    }
    .card1 .card1-image img {
        height: 100px;
    }
    .card1-content {
        border: 1px solid black;
    }
</style>

<script>
  export default {
    name: 'name',
    data () {
      return {
        data: 'example'
      }
    },
    mounted () {
      console.log('Mounted ok')
    }
  }
</script>
