import nltk
import speech_recognition as sr
import re
import pandas as pd
from nltk.stem import PorterStemmer
from collections import defaultdict

nltk.download('stopwords')
from nltk.corpus import stopwords


# removing stopwords
def rem_stopw(s):
    final = []
    s = s.lower()
    s = re.sub("[^a-zA-Z]", " ", s)
    stops = set(stopwords.words("english"))
    for a in s.split():
        if not a in stops:
            final.append(a)
    return final


# add the location of the dataset
df = pd.read_csv(r"C:\Users\JASWANTH\Desktop\emotions.csv", header=None)

# stemming words
X = df[0]
y = df[1]
stem_dict = {}
stemmer = PorterStemmer()
for i in range(X.shape[0]):
    stem_word = stemmer.stem(X[i])
    stem_dict[stem_word] = y[i]

flag = 0
while (flag == 0):
    print("\nSelect input types:")
    print("1. Text")
    print("2. Audio\n")
    inp = int(input())

    # taking text as input and analysing its emotions
    if (inp == 1):

        print("Enter text input:")
        text_inp = input()

        text_inp = rem_stopw(text_inp)

        text_inp2 = [stemmer.stem(i) for i in text_inp]
        li = []
        for i in text_inp2:
            try:
                li.append(stem_dict[i])
            except:
                print("")

        # print(li)
        if not li:
            print("Sorry can't find any result!")
        else:
            d = defaultdict(int)
            for i in li:
                d[i] += 1
                result = max(d.items(), key=lambda x: x[1])
            print("Emotion of given input is: " + result[0] + "\n")



    # taking audio as input and analysing its emotions   
    elif (inp == 2):

        r = sr.Recognizer()
        with sr.Microphone() as source:
            print("Say something!")
            audio = r.listen(source)
        try:
            print("You said: " + r.recognize_google(audio))
        except sr.UnknownValueError:
            print("Google Speech Recognition could not understand audio")
        except sr.RequestError as e:
            print("Could not request results from Google Speech Recognition service; {0}".format(e))

        sent_to_pred = r.recognize_google(audio)

        sent_to_pred = rem_stopw(sent_to_pred)

        sent_to_pred2 = [stemmer.stem(i) for i in sent_to_pred]
        li = []
        for i in sent_to_pred2:
            try:
                li.append(stem_dict[i])
            except:
                print("")

        # print(li)
        if not li:
            print("Sorry can't find any result!")
        else:
            d = defaultdict(int)
            for i in li:
                d[i] += 1
                result = max(d.items(), key=lambda x: x[1])
            print("Emotion of given input is: " + result[0] + "\n")
        sent_to_pred = ""
        sent_to_pred2 = ""



    else:
        print("Invalid Input.....\n")

    # asking for continuation
    print("Continue: y/n")
    cont = input()

    if (cont == 'y' or cont == 'Y'):
        flag = 0

    if (cont == 'n' or cont == 'N'):
        flag = 1
        print("Thank you!!!")
