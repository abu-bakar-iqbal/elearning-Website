<?php
// Data: Courses
$courses_data = [
    [
        'id' => 'python-ai',
        'title' => 'Python for AI Mastery',
        'level' => 'Beginner to Pro',
        'rating' => 4.9,
        'image' => 'https://images.unsplash.com/photo-1526379095098-d400fd0bf935?auto=format&fit=crop&q=80&w=800',
        'description' => 'Complete guide to Python programming tailored for Artificial Intelligence. Learn syntax, data structures, and libraries like NumPy and Pandas.',
        'tags' => ['Python', 'NumPy', 'Pandas'],
        'roadmap' => [
            ['title' => 'Python Fundamentals', 'desc' => 'Variables, Data Types, Control Flow, and Functions'],
            ['title' => 'Advanced Python', 'desc' => 'Decorators, Generators, Context Managers, and OOP'],
            ['title' => 'Numerical Computing with NumPy', 'desc' => 'Arrays, Broadcasting, Vectorization, and Linear Algebra'],
            ['title' => 'Data Manipulation with Pandas', 'desc' => 'DataFrames, Series, Cleaning, and Merging Datasets'],
            ['title' => 'Data Visualization', 'desc' => 'Matplotlib, Seaborn, and Interactive Plots with Plotly'],
            ['title' => 'Web Scraping & APIs', 'desc' => 'BeautifulSoup, Selenium, and Requests for Data Collection'],
            ['title' => 'Software Engineering for AI', 'desc' => 'Version Control (Git), Testing (PyTest), and Packaging'],
            ['title' => 'Final Project', 'desc' => 'Build a Comprehensive Data Analysis Pipeline']
        ]
    ],
    [
        'id' => 'deep-learning',
        'title' => 'Deep Learning Bootcamp',
        'level' => 'Advanced',
        'rating' => 4.8,
        'image' => 'https://images.unsplash.com/photo-1620712943543-bcc4688e7485?auto=format&fit=crop&q=80&w=800',
        'description' => 'Master Neural Networks, CNNs, RNNs, and Transformers with PyTorch. Build state-of-the-art models.',
        'tags' => ['Deep Learning', 'PyTorch', 'Neural Networks'],
        'roadmap' => [
            ['title' => 'Neural Network Basics', 'desc' => 'Neurons, Activation Functions, and The Perceptron'],
            ['title' => 'Training Dynamics', 'desc' => 'Loss Functions, Gradient Descent, and Backpropagation'],
            ['title' => 'PyTorch Fundamentals', 'desc' => 'Tensors, Autograd, and Building Custom Modules'],
            ['title' => 'Computer Vision (CNNs)', 'desc' => 'Convolutions, Pooling, ResNets, and Transfer Learning'],
            ['title' => 'Sequence Models (RNNs/LSTMs)', 'desc' => 'Handling Time Series and Sequential Data'],
            ['title' => 'Attention & Transformers', 'desc' => 'Self-Attention, Multi-Head Attention, and BERT Architecture'],
            ['title' => 'Generative Models', 'desc' => 'VAEs and GANs (Generative Adversarial Networks)'],
            ['title' => 'Capstone Project', 'desc' => 'Train a Style Transfer Model from Scratch']
        ]
    ],
    [
        'id' => 'nlp-transformers',
        'title' => 'NLP with Transformers',
        'level' => 'Intermediate',
        'rating' => 4.9,
        'image' => 'https://images.unsplash.com/photo-1555949963-ff9fe0c870eb?auto=format&fit=crop&q=80&w=800',
        'description' => 'Build state-of-the-art language models and chatbots using Hugging Face and Transformer architectures.',
        'tags' => ['NLP', 'Transformers', 'HuggingFace'],
        'roadmap' => [
            ['title' => 'NLP Foundations', 'desc' => 'Regex, Text Cleaning, Stemming, and Lemmatization'],
            ['title' => 'Vector Space Models', 'desc' => 'TF-IDF, Word2Vec, GloVe, and Semantic Similarity'],
            ['title' => 'The Transformer Revolution', 'desc' => 'The "Attention Is All You Need" Paper Explained'],
            ['title' => 'Hugging Face Ecosystem', 'desc' => 'Datasets, Tokenizers, and the Transformers Library'],
            ['title' => 'BERT & Fine-Tuning', 'desc' => 'Classification, NER, and Question Answering'],
            ['title' => 'Generative LLMs (GPT)', 'desc' => 'Text Generation, Prompting, and Decoding Strategies'],
            ['title' => 'Production NLP', 'desc' => 'Quantization, Distillation, and ONNX Runtime'],
            ['title' => 'Final Project', 'desc' => 'Build a Semantic Search Engine for Legal Documents']
        ]
    ],
    [
        'id' => 'computer-vision-yolo',
        'title' => 'Computer Vision & YOLO',
        'level' => 'Intermediate',
        'rating' => 4.7,
        'image' => 'https://images.unsplash.com/photo-1555255707-c07966088b7b?auto=format&fit=crop&q=80&w=800',
        'description' => 'Learn how computers see. Object detection, segmentation, and tracking using OpenCV and YOLO.',
        'tags' => ['CV', 'OpenCV', 'YOLO'],
        'roadmap' => [
            ['title' => 'Digital Image Fundamentals', 'desc' => 'Pixels, RGB vs HSV, and Image Representation'],
            ['title' => 'OpenCV Essentials', 'desc' => 'Drawing, Transformations, Blurring, and Thresholding'],
            ['title' => 'Feature Detection', 'desc' => 'Canny Edge Detection, Contours, and Hough Transforms'],
            ['title' => 'Face Detection', 'desc' => 'Haar Cascades and Histogram of Oriented Gradients (HOG)'],
            ['title' => 'Deep Learning for CV', 'desc' => 'CNN Architectures specifically for Object Detection'],
            ['title' => 'YOLO (You Only Look Once)', 'desc' => 'Architecture, Anchors, and Intersection over Union (IoU)'],
            ['title' => 'YOLOv8 Training', 'desc' => 'Custom Dataset Annotation and Fine-tuning YOLOv8'],
            ['title' => 'Real-World Project', 'desc' => 'Build a Real-Time Traffic Monitoring System']
        ]
    ],
    [
        'id' => 'generative-ai',
        'title' => 'Generative AI Development',
        'level' => 'Advanced',
        'rating' => 5.0,
        'image' => 'https://images.unsplash.com/photo-1677442136019-21780ecad995?auto=format&fit=crop&q=80&w=800',
        'description' => 'The cutting edge. Learn to build applications with LLMs, RAG, and Diffusers.',
        'tags' => ['GenAI', 'LLMs', 'Stable Diffusion'],
        'roadmap' => [
            ['title' => 'Generative Capabilities', 'desc' => 'Text-to-Text, Text-to-Image, and Audio Generation'],
            ['title' => 'Prompt Engineering', 'desc' => 'Zero-shot, Few-shot, and Chain-of-Thought Prompting'],
            ['title' => 'LangChain Framework', 'desc' => 'Chains, Agents, Memory, and Document Loaders'],
            ['title' => 'RAG Systems', 'desc' => 'Vector Databases (Pinecone/ChromaDB) and Embeddings'],
            ['title' => 'Fine-Tuning LLMs', 'desc' => 'LoRA, QLoRA, and PEFT on Consumer GPUs'],
            ['title' => 'Image Generation', 'desc' => 'Stable Diffusion Architecture and ControlNet'],
            ['title' => 'AI Agents', 'desc' => 'Building Autonomous Workers with AutoGPT concepts'],
            ['title' => 'Capstone', 'desc' => 'Create a Multi-Modal AI Assistant for Coding']
        ]
    ],
    [
        'id' => 'mlops-professional',
        'title' => 'MLOps Professional',
        'level' => 'Advanced',
        'rating' => 4.8,
        'image' => 'https://images.unsplash.com/photo-1551033406-611cf9a28f67?auto=format&fit=crop&q=80&w=800',
        'description' => 'Move models from notebooks to production. CI/CD for Machine Learning, Docker, and Kubernetes.',
        'tags' => ['MLOps', 'Docker', 'Kubernetes'],
        'roadmap' => [
            ['title' => 'Production ML Overview', 'desc' => 'The MLOps Lifecycle and Technical Debt'],
            ['title' => 'Model Tracking', 'desc' => 'Experiment Tracking with MLflow and Weights & Biases'],
            ['title' => 'Containerization', 'desc' => 'Docker Basics and Best Practices for ML Images'],
            ['title' => 'Orchestration', 'desc' => 'Kubernetes (K8s) for Scaling Model Serving'],
            ['title' => 'CI/CD Pipelines', 'desc' => 'GitHub Actions for Automated Testing and Deployment'],
            ['title' => 'Model Serving', 'desc' => 'Flask, FastAPI, and TorchServe'],
            ['title' => 'Monitoring & Drift', 'desc' => 'Detecting Data Drift and Concept Drift in Production'],
            ['title' => 'Project', 'desc' => 'End-to-End Deployment of a Credit Risk Model']
        ]
    ],
    [
        'id' => 'reinforcement-learning',
        'title' => 'Reinforcement Learning',
        'level' => 'Advanced',
        'rating' => 4.7,
        'image' => 'https://images.unsplash.com/photo-1485827404703-89b55fcc595e?auto=format&fit=crop&q=80&w=800',
        'description' => 'Train agents to make decisions. From Q-Learning to Deep Q-Networks and Policy Gradients.',
        'tags' => ['RL', 'Robotics', 'Gaming'],
        'roadmap' => [
            ['title' => 'RL Foundations', 'desc' => 'Agents, Environments, States, Actions, and Rewards'],
            ['title' => 'Markov Decision Processes', 'desc' => 'Bellman Equations and Value Functions'],
            ['title' => 'Tabular Methods', 'desc' => 'Q-Learning and SARSA'],
            ['title' => 'Deep Q-Networks (DQN)', 'desc' => 'Experience Replay and Target Networks'],
            ['title' => 'Policy Gradients', 'desc' => 'REINFORCE Algorithm and Actor-Critic Methods'],
            ['title' => 'PPO & TRPO', 'desc' => 'Proximal Policy Optimization for Stable Training'],
            ['title' => 'Multi-Agent RL', 'desc' => 'Cooperative and Competitive Environments'],
            ['title' => 'Capstone', 'desc' => 'Train a Robot to Navigate a Maze']
        ]
    ],
    [
        'id' => 'data-science',
        'title' => 'Data Science Bootcamp',
        'level' => 'Beginner',
        'rating' => 4.6,
        'image' => 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?auto=format&fit=crop&q=80&w=800',
        'description' => 'Data analysis, visualization, and statistical modeling with Python. Make data-driven decisions.',
        'tags' => ['Data Science', 'Statistics', 'Visualization'],
        'roadmap' => [
            ['title' => 'Statistical Foundations', 'desc' => 'Descriptive vs Inferential Statistics'],
            ['title' => 'Hypothesis Testing', 'desc' => 'T-tests, Anova, and P-Values'],
            ['title' => 'Python for Analysis', 'desc' => 'Advanced Pandas transformations'],
            ['title' => 'Exploratory Data Analysis', 'desc' => 'Uncovering Patterns and Anomalies'],
            ['title' => 'Feature Engineering', 'desc' => 'Encoding, Scaling, and Imputation'],
            ['title' => 'Supervised Learning', 'desc' => 'Linear Regression and Logistic Regression'],
            ['title' => 'Unsupervised Learning', 'desc' => 'K-Means Clustering and PCA'],
            ['title' => 'Project', 'desc' => 'Predict Housing Prices with 95% Accuracy']
        ]
    ],
    [
        'id' => 'ai-ethics',
        'title' => 'AI Ethics & Safety',
        'level' => 'All Levels',
        'rating' => 4.9,
        'image' => 'https://images.unsplash.com/photo-1507146426996-ef05306b995a?auto=format&fit=crop&q=80&w=800',
        'description' => 'Understanding the societal impact, bias, and control of Artificial Intelligence.',
        'tags' => ['Ethics', 'Safety', 'Philosophy'],
        'roadmap' => [
            ['title' => 'The Alignment Problem', 'desc' => 'Defining Goals for AI Systems'],
            ['title' => 'Algorithmic Bias', 'desc' => 'Case Studies in Hiring, Policing, and Lending'],
            ['title' => 'Fairness Metrics', 'desc' => 'Demographic Parity and Equal Opportunity'],
            ['title' => 'Explainable AI (XAI)', 'desc' => 'LIME, SHAP, and Saliency Maps'],
            ['title' => 'Privacy & Security', 'desc' => 'Differential Privacy and Federated Learning'],
            ['title' => 'AI Governance', 'desc' => 'EU AI Act and Global Regulations'],
            ['title' => 'Existential Risk', 'desc' => 'Superintelligence and Control Scenarios'],
            ['title' => 'Final Essay', 'desc' => 'Designing an Ethical AI Framework for a Corporation']
        ]
    ]
];

// Data: Blog Posts
$blog_posts = [
    [
        'id' => 1,
        'title' => 'Generative AI: The Ultimate Guide for 2025',
        'excerpt' => 'What is Generative AI? From LLMs to image generation, explore the technology reshaping our world.',
        'image' => 'https://images.unsplash.com/photo-1620712943543-bcc4688e7485?auto=format&fit=crop&q=80&w=800',
        'content' => [
            'Generative AI is shifting paradigms in every industry. At Elearn, we teach you how to harness this power.',
            'Key Trends: Multimodal models (text-to-video), personalized AI assistants, and enterprise adoption are dominating 2025.',
            'Tools to Watch: OpenAI Sora for video, Google Gemini Ultra for reasoning, and Midjourney V7 for art.',
            'Impact: Generative AI is not just for tech giants; Elearn students are applying it in healthcare, finance, and creative arts.',
            'Elearn Recommendation: Start with our "Deep Learning Bootcamp" to understand the transformers behind these models.'
        ]
    ],
    [
        'id' => 2,
        'title' => 'ChatGPT vs Claude vs Gemini: Best AI Model?',
        'excerpt' => 'The battle of the giants. We compare the top LLMs on reasoning, coding, and creative writing.',
        'image' => 'https://images.unsplash.com/photo-1518770660439-4636190af475?auto=format&fit=crop&q=80&w=800',
        'content' => [
            'Comparing Large Language Models (LLMs) is crucial for developers. Elearn experts have benchmarked the top 3.',
            '1. ChatGPT (OpenAI): The best all-rounder. Great for general reasoning and integrated with many third-party apps.',
            '2. Claude 3.5 (Anthropic): Superior in coding and logic. Elearn instructors prefer Claude for explaining complex Python code.',
            '3. Gemini (Google): The multimodal king. Best for analyzing images and video inputs alongside text.',
            'Verdict: Use Claude for coding (taught in Elearn\'s Python course), ChatGPT for drafting, and Gemini for data analysis.'
        ]
    ],
    [
        'id' => 3,
        'title' => 'Will AI Replace Programmers? The Truth on AI Jobs',
        'excerpt' => 'Is your job safe? Discover how AI is shifting the job market and which skills you need to survive.',
        'image' => 'https://images.unsplash.com/photo-1555949963-ff9fe0c870eb?auto=format&fit=crop&q=80&w=800',
        'content' => [
            'The fear that "AI will replace programmers" is a myth. The reality is: programmers using AI will replace those who don\'t.',
            'Shift to Semantics: Elearn emphasizes system design over syntax. AI generates the boilerplate; you architect the solution.',
            'New Roles Emerging: AI Engineer, Prompt Engineer, and Ethics Compliance Officer are the hottest jobs on the market.',
            'Elearn Advantage: Our curriculum is designed to make you the "AI Architect" of the future, not just a coder.',
            'Advice: Don\'t fight the revolution. Join Elearn and master the tools that amplify your productivity.'
        ]
    ],
    [
        'id' => 4,
        'title' => 'Top 10 High-Paying AI Skills in 2025',
        'excerpt' => 'Want to boost your salary? Master these in-demand AI skills to stay ahead of the curve.',
        'image' => 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?auto=format&fit=crop&q=80&w=800',
        'content' => [
            'Salaries for AI professionals are skyrocketing. Here are the skills Elearn recommends mastering:',
            '1. Prompt Engineering: The art of communicating with models. Vital for Generative AI.',
            '2. RAG Pipelines: Retrieval Augmented Generation allows AIs to use your private data. A core topic in Elearn\'s NLP course.',
            '3. Fine-Tuning LLMs: Customizing foundation models for specific business needs.',
            '4. AI Ethics: Navigating the legal and moral landscape of autonomous systems.',
            '5. Agentic Workflows: Building autonomous systems with LangChain. Learn this in our new "AI Agents" module.'
        ]
    ],
    [
        'id' => 5,
        'title' => 'How to Make Money with AI: 5 Proven Methods',
        'excerpt' => 'Turn the AI boom into your side hustle or startup. Real strategies that work today.',
        'image' => 'https://images.unsplash.com/photo-1579621970563-ebec7560ff3e?auto=format&fit=crop&q=80&w=800',
        'content' => [
            'The AI Gold Rush is here. Elearn graduates are launching startups and side hustles daily.',
            '1. AI Content Creation: Use Midjourney and Jasper to scale marketing agencies.',
            '2. SaaS Wrapper Apps: Solve niche problems (review analysis, legal summaries) using API wrappers.',
            '3. Sell Prompts: Marketplaces for high-quality prompts are booming. Elearn teaches advanced prompting techniques.',
            '4. AI Consulting: Help small businesses integrate AI tools to cut costs.',
            '5. Custom Chatbots: Build support bots for local companies using the skills from Elearn\'s NLP course.'
        ]
    ],
    [
        'id' => 6,
        'title' => 'The Future of AI Agents: Beyond Chatbots',
        'excerpt' => 'Why autonomous agents are the next big thing. Agents that can plan, reason, and execute.',
        'image' => 'https://images.unsplash.com/photo-1531746790731-6c087fecd65a?auto=format&fit=crop&q=80&w=800',
        'content' => [
            'Chatbots just talk; AI Agents get things done. This is the next frontier of Artificial Intelligence.',
            'Agent Capabilities: Agents can browse the web, run code, and control other software. Elearn is pioneering agentic workflows.',
            'Frameworks: LangGraph and CrewAI are leading the charge in multi-agent orchestration.',
            'The Vision: Imagine an "Elearn Tutor Agent" that schedules your study time, finds resources, and quizzes you automatically.',
            'Challenge: Reliability and safety remain hurdles, which is why Elearn\'s Ethics course covers agent control.'
        ]
    ],
    [
        'id' => 7,
        'title' => 'Deepfakes and Verification: The Truth',
        'excerpt' => 'How to spot AI-generated content and protect yourself from misinformation.',
        'image' => 'https://images.unsplash.com/photo-1526374965328-7f61d4dc18c5?auto=format&fit=crop&q=80&w=800',
        'content' => [
            'Deepfakes are becoming indistinguishable from reality. Verification is the new cybersecurity.',
            'Detection Tools: AI is being used to catch AI. Learn about adversarial networks in Elearn\'s GANs module.',
            'Watermarking: Companies like Google DeepMind are introducing SynthID to label AI content.',
            'Elearn Stance: We advocate for responsible AI usage. Our "AI Ethics & Safety" course digs deep into media provenance.',
            'Stay Safe: Always verify sources. If an audio clip sounds too sensational, check the metadata.'
        ]
    ],
    [
        'id' => 8,
        'title' => 'AI in Healthcare: Saving Lives',
        'excerpt' => 'From drug discovery to early diagnosis, how AI is revolutionizing modern medicine.',
        'image' => 'https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?auto=format&fit=crop&q=80&w=800',
        'content' => [
            'AI is not just code; it\'s a lifesaver. Elearn highlights the intersection of BioTech and AI.',
            'Diagnosis: Computer Vision models (taught at Elearn) detect tumors in X-rays with higher accuracy than human radiologists.',
            'Drug Discovery: Generative AI designs new protein structures, cutting years off drug development.',
            'Personalized Medicine: AI analyzes genetic data to tailor treatments. Data Science skills from Elearn are crucial here.',
            'Future: Surgical robots assisted by AI will perform complex operations with sub-millimeter precision.'
        ]
    ],
    [
        'id' => 9,
        'title' => 'Open Source vs Closed Source AI',
        'excerpt' => 'Llama 3 vs GPT-4. The battle for the soul of Artificial Intelligence.',
        'image' => 'https://images.unsplash.com/photo-1550751827-4bd374c3f58b?auto=format&fit=crop&q=80&w=800',
        'content' => [
            'Should AI be open for everyone or controlled by a few? This debate defines the industry.',
            'Open Source (Meta Llama, Mistral): Promotes innovation and transparency. Elearn students love fine-tuning these models locally.',
            'Closed Source (OpenAI, Google): Offers highest performance but "black box" nature. Great for API-usage.',
            'Security: Open source allows developers to audit code for backdoors. Closed source relies on trust.',
            'Elearn Recommendation: Master both. Use APIs for quick prototypes, and Open Source for custom, private, and cost-effective solutions.'
        ]
    ],
    [
        'id' => 10,
        'title' => 'The Hardware of AI: GPUs vs TPUs',
        'excerpt' => 'Understanding the engines that power the AI revolution. NVIDIA, Google, and beyond.',
        'image' => 'https://images.unsplash.com/photo-1518770660439-4636190af475?auto=format&fit=crop&q=80&w=800',
        'content' => [
            'Software needs hardware. The AI boom is a hardware boom.',
            'NVIDIA: The undisputed king. Elearn courses often use Google Colab T4 GPUs for training.',
            'TPUs (Tensor Processing Units): Google\'s custom chips designed specifically for matrix math.',
            'The Edge: AI is moving to phones and laptops (NPUs). Efficient coding (quantization) is a key skill taught at Elearn.',
            'Investment: Computing power is the new oil. Understanding hardware constraints makes you a better AI Engineer.'
        ]
    ]
];
?>
